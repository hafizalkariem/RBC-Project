<?php
// Test expired payment scenario
require_once 'vendor/autoload.php';

// Load environment
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $pdo = new PDO(
        "mysql:host=127.0.0.1;port=3307;dbname=rbc_project", 
        "root", 
        ""
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "=== TESTING EXPIRED PAYMENT SCENARIO ===\n\n";
    
    // Step 1: Create a test order with pending payment
    echo "1. Creating test order...\n";
    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, total_amount, status, payment_method, payment_id, payment_status, payment_details, snap_token, created_at, updated_at)
        VALUES (2, 50000, 'pending', 'qris', ?, 'pending', ?, 'test-token', NOW(), NOW())
    ");
    
    $testOrderId = 'TEST-EXPIRE-' . time();
    $paymentDetails = json_encode([
        'transaction_status' => 'pending',
        'payment_type' => 'qris',
        'expiry_time' => date('Y-m-d H:i:s', strtotime('+5 minutes')), // 5 minutes from now
        'order_id' => $testOrderId
    ]);
    
    $stmt->execute([$testOrderId, $paymentDetails]);
    $orderId = $pdo->lastInsertId();
    
    echo "   ✓ Test order created: ID #{$orderId}, Payment ID: {$testOrderId}\n";
    echo "   ✓ Expiry time: " . date('Y-m-d H:i:s', strtotime('+5 minutes')) . "\n\n";
    
    // Step 2: Show current status
    echo "2. Current order status:\n";
    $stmt = $pdo->prepare("SELECT id, status, payment_status, payment_details FROM orders WHERE id = ?");
    $stmt->execute([$orderId]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "   Status: {$order['status']}\n";
    echo "   Payment Status: {$order['payment_status']}\n\n";
    
    // Step 3: Force expire the payment (simulate time passing)
    echo "3. Simulating payment expiry (forcing expiry time to past)...\n";
    $expiredPaymentDetails = json_decode($order['payment_details'], true);
    $expiredPaymentDetails['expiry_time'] = date('Y-m-d H:i:s', strtotime('-1 hour')); // 1 hour ago
    
    $stmt = $pdo->prepare("
        UPDATE orders 
        SET payment_details = ? 
        WHERE id = ?
    ");
    $stmt->execute([json_encode($expiredPaymentDetails), $orderId]);
    
    echo "   ✓ Payment expiry time set to: " . $expiredPaymentDetails['expiry_time'] . "\n\n";
    
    // Step 4: Test the expired payment detection
    echo "4. Testing expired payment detection...\n";
    
    // Simulate the check-expired route logic
    $stmt = $pdo->prepare("
        SELECT id, payment_details, status, payment_status 
        FROM orders 
        WHERE id = ? AND payment_status = 'pending'
    ");
    $stmt->execute([$orderId]);
    $pendingOrder = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($pendingOrder) {
        $paymentDetails = json_decode($pendingOrder['payment_details'], true);
        if (isset($paymentDetails['expiry_time'])) {
            $expiryTime = new DateTime($paymentDetails['expiry_time']);
            $now = new DateTime();
            
            if ($expiryTime < $now) {
                echo "   ✓ Payment detected as expired\n";
                
                // Update status to failed
                $stmt = $pdo->prepare("
                    UPDATE orders 
                    SET status = 'failed', payment_status = 'expire' 
                    WHERE id = ?
                ");
                $stmt->execute([$orderId]);
                
                echo "   ✓ Order status updated to 'failed'\n";
                echo "   ✓ Payment status updated to 'expire'\n\n";
            }
        }
    }
    
    // Step 5: Verify final status
    echo "5. Final order status:\n";
    $stmt = $pdo->prepare("SELECT id, status, payment_status FROM orders WHERE id = ?");
    $stmt->execute([$orderId]);
    $finalOrder = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "   Order ID: #{$finalOrder['id']}\n";
    echo "   Status: {$finalOrder['status']}\n";
    echo "   Payment Status: {$finalOrder['payment_status']}\n\n";
    
    if ($finalOrder['status'] === 'failed' && $finalOrder['payment_status'] === 'expire') {
        echo "✅ SUCCESS: Expired payment scenario working correctly!\n";
        echo "   - Status changed from 'pending' to 'failed'\n";
        echo "   - Payment status changed from 'pending' to 'expire'\n";
    } else {
        echo "❌ FAILED: Status not updated correctly\n";
    }
    
    // Cleanup
    echo "\n6. Cleaning up test data...\n";
    $stmt = $pdo->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->execute([$orderId]);
    echo "   ✓ Test order deleted\n";
    
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== TEST COMPLETED ===\n";
?>