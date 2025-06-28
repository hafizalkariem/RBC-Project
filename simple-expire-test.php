<?php
// Simple test to create expired order and verify sync
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=rbc_project", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create test order with expired payment
    $testOrderId = 'TEST-EXPIRE-' . time();
    $paymentDetails = [
        'transaction_status' => 'pending',
        'payment_type' => 'qris',
        'expiry_time' => date('Y-m-d H:i:s', strtotime('-1 hour')), // Already expired
        'order_id' => $testOrderId
    ];
    
    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, total_amount, status, payment_method, payment_id, payment_status, payment_details, created_at, updated_at)
        VALUES (2, 50000, 'pending', 'qris', ?, 'pending', ?, NOW(), NOW())
    ");
    
    $stmt->execute([$testOrderId, json_encode($paymentDetails)]);
    $orderId = $pdo->lastInsertId();
    
    echo "Created test order #$orderId with expired payment\n";
    echo "Payment ID: $testOrderId\n";
    echo "Expiry time: " . $paymentDetails['expiry_time'] . " (already expired)\n\n";
    
    // Now test the sync
    echo "Testing sync command...\n";
    system('php artisan payments:sync-expired');
    
    // Check final status
    $stmt = $pdo->prepare("SELECT status, payment_status FROM orders WHERE id = ?");
    $stmt->execute([$orderId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "\nFinal status:\n";
    echo "Status: " . $result['status'] . "\n";
    echo "Payment Status: " . $result['payment_status'] . "\n";
    
    if ($result['status'] === 'cancelled' && $result['payment_status'] === 'expire') {
        echo "\n✅ SUCCESS: Order correctly marked as cancelled/expired!\n";
    } else {
        echo "\n❌ FAILED: Status not updated correctly\n";
        echo "Expected: cancelled/expire, Got: {$result['status']}/{$result['payment_status']}\n";
    }
    
    // Cleanup
    $pdo->prepare("DELETE FROM orders WHERE id = ?")->execute([$orderId]);
    echo "\nTest order cleaned up.\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>