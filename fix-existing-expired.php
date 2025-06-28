<?php
// Fix existing expired orders that have payment_status = expire but status = pending
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=rbc_project", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "=== FIXING EXISTING EXPIRED ORDERS ===\n\n";
    
    // Find orders with payment_status = expire but status = pending
    $stmt = $pdo->query("
        SELECT id, status, payment_status 
        FROM orders 
        WHERE payment_status = 'expire' AND status = 'pending'
    ");
    
    $expiredOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Found " . count($expiredOrders) . " expired orders with pending status\n\n";
    
    if (count($expiredOrders) > 0) {
        // Update status to cancelled for expired orders
        $updateStmt = $pdo->prepare("
            UPDATE orders 
            SET status = 'cancelled' 
            WHERE payment_status = 'expire' AND status = 'pending'
        ");
        
        $updateStmt->execute();
        $updatedCount = $updateStmt->rowCount();
        
        echo "✅ Updated $updatedCount orders from 'pending' to 'cancelled' status\n\n";
        
        // Show updated orders
        echo "Updated orders:\n";
        foreach ($expiredOrders as $order) {
            echo "  Order #{$order['id']}: pending → cancelled (payment_status: expire)\n";
        }
    } else {
        echo "No orders need fixing.\n";
    }
    
    echo "\n=== VERIFICATION ===\n";
    
    // Verify the fix
    $stmt = $pdo->query("
        SELECT status, payment_status, COUNT(*) as count 
        FROM orders 
        WHERE payment_status = 'expire' 
        GROUP BY status, payment_status
    ");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Status: {$row['status']}, Payment Status: {$row['payment_status']}, Count: {$row['count']}\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== COMPLETED ===\n";
?>