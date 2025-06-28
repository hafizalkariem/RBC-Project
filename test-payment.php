<?php
// Simple payment testing script
require_once 'vendor/autoload.php';

// Load environment
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Midtrans configuration
\Midtrans\Config::$serverKey = $_ENV['MIDTRANS_SERVER_KEY'];
\Midtrans\Config::$isProduction = $_ENV['MIDTRANS_IS_PRODUCTION'] === 'true';

function testPaymentStatus($orderId) {
    try {
        $status = \Midtrans\Transaction::status($orderId);
        echo "Order ID: $orderId\n";
        echo "Status: " . $status->transaction_status . "\n";
        echo "Payment Type: " . ($status->payment_type ?? 'N/A') . "\n";
        echo "Gross Amount: " . ($status->gross_amount ?? 'N/A') . "\n";
        echo "Transaction Time: " . ($status->transaction_time ?? 'N/A') . "\n";
        echo "Expiry Time: " . ($status->expiry_time ?? 'N/A') . "\n";
        echo "---\n";
        return $status;
    } catch (Exception $e) {
        echo "Error for $orderId: " . $e->getMessage() . "\n";
        return null;
    }
}

function createTestTransaction() {
    $orderId = 'TEST-' . time();
    
    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => 10000,
        ],
        'item_details' => [
            [
                'id' => 'test-item',
                'price' => 10000,
                'quantity' => 1,
                'name' => 'Test Product'
            ]
        ],
        'customer_details' => [
            'first_name' => 'Test',
            'email' => 'test@example.com',
        ]
    ];
    
    try {
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        echo "Test transaction created:\n";
        echo "Order ID: $orderId\n";
        echo "Snap Token: $snapToken\n";
        echo "Payment URL: https://app.sandbox.midtrans.com/snap/v2/vtweb/$snapToken\n";
        echo "---\n";
        return $orderId;
    } catch (Exception $e) {
        echo "Error creating transaction: " . $e->getMessage() . "\n";
        return null;
    }
}

// Main testing
echo "=== MIDTRANS PAYMENT TESTING ===\n\n";

// Test 1: Create test transaction
echo "1. Creating test transaction...\n";
$testOrderId = createTestTransaction();

if ($testOrderId) {
    echo "\n2. Checking transaction status...\n";
    testPaymentStatus($testOrderId);
}

// Test 2: Check existing orders (if any)
echo "\n3. Testing existing orders...\n";
$existingOrders = [
    // Add your existing order IDs here for testing
    // 'ORDER-123-456789',
];

foreach ($existingOrders as $orderId) {
    testPaymentStatus($orderId);
}

echo "\nTesting completed!\n";
?>