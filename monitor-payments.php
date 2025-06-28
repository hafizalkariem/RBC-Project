<?php
// Simple payment monitoring script
echo "=== PAYMENT MONITORING ===\n\n";

// Database connection
try {
    $pdo = new PDO(
        "mysql:host=127.0.0.1;port=3307;dbname=rbc_project", 
        "root", 
        ""
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get payment status summary
    echo "1. Payment Status Summary:\n";
    $stmt = $pdo->query("
        SELECT payment_status, COUNT(*) as count 
        FROM orders 
        WHERE payment_id IS NOT NULL 
        GROUP BY payment_status
    ");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "   {$row['payment_status']}: {$row['count']}\n";
    }
    
    echo "\n2. Recent Orders:\n";
    $stmt = $pdo->query("
        SELECT id, payment_id, payment_status, status, total_amount, created_at 
        FROM orders 
        WHERE payment_id IS NOT NULL 
        ORDER BY created_at DESC 
        LIMIT 10
    ");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "   Order #{$row['id']}: {$row['payment_status']} | {$row['status']} | Rp " . number_format($row['total_amount']) . " | {$row['created_at']}\n";
    }
    
    echo "\n3. Pending Orders (Need Sync):\n";
    $stmt = $pdo->query("
        SELECT id, payment_id, payment_status, created_at,
               CASE 
                   WHEN created_at < DATE_SUB(NOW(), INTERVAL 24 HOUR) THEN 'EXPIRED'
                   ELSE 'ACTIVE'
               END as expiry_status
        FROM orders 
        WHERE payment_status = 'pending' 
        AND payment_id IS NOT NULL
        ORDER BY created_at DESC
    ");
    
    $pendingCount = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pendingCount++;
        echo "   Order #{$row['id']}: {$row['payment_id']} | {$row['expiry_status']} | {$row['created_at']}\n";
    }
    
    if ($pendingCount == 0) {
        echo "   No pending orders found.\n";
    }
    
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . "\n";
}

echo "\n=== END MONITORING ===\n";
?>