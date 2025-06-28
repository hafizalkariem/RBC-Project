<?php
// Force expire test order
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$orderId = $argv[1] ?? null;

if (!$orderId) {
    echo "Usage: php force-expire-test.php <order_id>\n";
    exit(1);
}

try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=rbc_project", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "=== FORCE EXPIRE TEST ORDER #$orderId ===\n\n";
    
    // Get current order
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->execute([$orderId]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$order) {
        echo "❌ Order #$orderId not found\n";
        exit(1);
    }
    
    echo "📋 Current order status:\n";
    echo "   Status: {$order['status']}\n";
    echo "   Payment Status: {$order['payment_status']}\n\n";
    
    if ($order['payment_status'] !== 'pending') {
        echo "⚠️  Order is not pending, current status: {$order['payment_status']}\n";
        exit(1);
    }
    
    // Force expire by setting expiry_time to past
    date_default_timezone_set('Asia/Jakarta');
    $paymentDetails = json_decode($order['payment_details'], true);
    $paymentDetails['expiry_time'] = date('Y-m-d H:i:s', strtotime('-1 hour')); // 1 hour ago
    
    $stmt = $pdo->prepare("
        UPDATE orders 
        SET payment_details = ? 
        WHERE id = ?
    ");
    $stmt->execute([json_encode($paymentDetails), $orderId]);
    
    echo "⏰ Forced expiry time to: {$paymentDetails['expiry_time']}\n\n";
    
    // Run sync command to detect expiry
    echo "🔄 Running sync command...\n";
    system('php artisan payments:sync-expired');
    
    // Check final status
    $stmt->execute([$orderId]);
    $updatedOrder = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "\n📊 Final order status:\n";
    echo "   Status: {$updatedOrder['status']}\n";
    echo "   Payment Status: {$updatedOrder['payment_status']}\n\n";
    
    if ($updatedOrder['status'] === 'cancelled' && $updatedOrder['payment_status'] === 'expire') {
        echo "✅ SUCCESS: Order successfully expired!\n";
        echo "🔗 Refresh profile page to see the change\n";
    } else {
        echo "❌ FAILED: Order status not updated correctly\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "\n=== FORCE EXPIRE TEST COMPLETED ===\n";
?>