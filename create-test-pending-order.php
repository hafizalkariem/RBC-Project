<?php
// Create test pending order for countdown testing
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=rbc_project", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "=== CREATING TEST PENDING ORDER ===\n\n";
    
    // Create test order with pending payment (5 minutes expiry)
    $testOrderId = 'TEST-PENDING-' . time();
    // Set timezone to Indonesia
    date_default_timezone_set('Asia/Jakarta');
    $expiryTime = date('Y-m-d H:i:s', strtotime('+5 minutes')); // 5 minutes from now
    
    $paymentDetails = [
        'transaction_status' => 'pending',
        'payment_type' => 'qris',
        'expiry_time' => $expiryTime,
        'order_id' => $testOrderId,
        'gross_amount' => '75000.00',
        'currency' => 'IDR'
    ];
    
    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, total_amount, status, payment_method, payment_id, payment_status, payment_details, snap_token, created_at, updated_at)
        VALUES (2, 75000, 'pending', 'qris', ?, 'pending', ?, 'test-snap-token-123', NOW(), NOW())
    ");
    
    $stmt->execute([$testOrderId, json_encode($paymentDetails)]);
    $orderId = $pdo->lastInsertId();
    
    echo "✅ Test pending order created successfully!\n";
    echo "   Order ID: #$orderId\n";
    echo "   Payment ID: $testOrderId\n";
    echo "   Expiry Time: $expiryTime\n";
    echo "   Status: pending\n";
    echo "   Payment Status: pending\n\n";
    
    echo "🔗 Now visit: http://localhost/RBC-Project/public/profile\n";
    echo "   (Make sure you're logged in as user ID 2)\n\n";
    
    echo "⏰ The countdown timer should show approximately 5 minutes remaining\n";
    echo "   and count down in real-time!\n\n";
    
    echo "🧪 To test expiry, you can:\n";
    echo "   1. Wait 5 minutes for natural expiry\n";
    echo "   2. Or run: php force-expire-test.php $orderId\n\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "=== TEST ORDER CREATED ===\n";
?>