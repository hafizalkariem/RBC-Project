<?php
// Monitor countdown in real-time
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=rbc_project", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "=== MONITORING PENDING PAYMENTS COUNTDOWN ===\n\n";
    
    while (true) {
        // Clear screen
        system('cls'); // Windows
        // system('clear'); // Linux/Mac
        
        echo "=== PENDING PAYMENTS MONITOR ===\n";
        echo "Time: " . date('Y-m-d H:i:s') . "\n\n";
        
        // Get all pending orders
        $stmt = $pdo->query("
            SELECT id, payment_id, payment_details, created_at 
            FROM orders 
            WHERE payment_status = 'pending' 
            AND payment_details IS NOT NULL
            ORDER BY created_at DESC
        ");
        
        $pendingOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (empty($pendingOrders)) {
            echo "📭 No pending orders found\n\n";
        } else {
            foreach ($pendingOrders as $order) {
                $paymentDetails = json_decode($order['payment_details'], true);
                
                echo "🔸 Order #{$order['id']} ({$order['payment_id']})\n";
                echo "   Created: {$order['created_at']}\n";
                
                if (isset($paymentDetails['expiry_time'])) {
                    $expiryTime = new DateTime($paymentDetails['expiry_time']);
                    $now = new DateTime();
                    
                    if ($expiryTime < $now) {
                        echo "   Status: ❌ EXPIRED (" . $expiryTime->format('H:i:s') . ")\n";
                        echo "   Action: Should be auto-expired by sync\n";
                    } else {
                        $diff = $now->diff($expiryTime);
                        $timeLeft = '';
                        
                        if ($diff->h > 0) {
                            $timeLeft = sprintf('%d:%02d:%02d', $diff->h, $diff->i, $diff->s);
                        } else {
                            $timeLeft = sprintf('%d:%02d', $diff->i, $diff->s);
                        }
                        
                        $status = '⏰';
                        if ($diff->i < 5 && $diff->h == 0) {
                            $status = '🔥'; // Less than 5 minutes
                        } elseif ($diff->i < 10 && $diff->h == 0) {
                            $status = '⚠️'; // Less than 10 minutes
                        }
                        
                        echo "   Status: $status Time Left: $timeLeft\n";
                        echo "   Expires: " . $expiryTime->format('H:i:s') . "\n";
                    }
                } else {
                    echo "   Status: ❓ No expiry time found\n";
                }
                
                echo "\n";
            }
        }
        
        echo "Press Ctrl+C to stop monitoring...\n";
        echo "Refreshing in 5 seconds...\n";
        
        sleep(5);
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
?>