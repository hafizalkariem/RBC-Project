<?php
// Test timezone configuration
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo "=== TIMEZONE TESTING ===\n\n";

// Test PHP timezone
echo "1. PHP Default Timezone:\n";
echo "   Current: " . date_default_timezone_get() . "\n";
echo "   Time: " . date('Y-m-d H:i:s') . "\n\n";

// Set to Jakarta
date_default_timezone_set('Asia/Jakarta');
echo "2. After setting to Asia/Jakarta:\n";
echo "   Current: " . date_default_timezone_get() . "\n";
echo "   Time: " . date('Y-m-d H:i:s') . "\n\n";

// Test Carbon
use Carbon\Carbon;

echo "3. Carbon Timezone Test:\n";
$now = Carbon::now();
echo "   Default: " . $now->format('Y-m-d H:i:s T') . "\n";

$jakartaNow = Carbon::now('Asia/Jakarta');
echo "   Jakarta: " . $jakartaNow->format('Y-m-d H:i:s T') . "\n";

$utcNow = Carbon::now('UTC');
echo "   UTC: " . $utcNow->format('Y-m-d H:i:s T') . "\n\n";

// Test expiry time calculation
echo "4. Expiry Time Test (5 minutes from now):\n";
$expiryTime = Carbon::now('Asia/Jakarta')->addMinutes(5);
echo "   Expiry: " . $expiryTime->format('Y-m-d H:i:s T') . "\n";
echo "   Timestamp: " . $expiryTime->timestamp . "\n";
echo "   Formatted: " . date('Y-m-d H:i:s', $expiryTime->timestamp) . "\n\n";

// Test database connection and timezone
try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3307;dbname=rbc_project", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "5. Database Timezone Test:\n";
    $stmt = $pdo->query("SELECT NOW() as db_time, @@session.time_zone as db_timezone");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "   DB Time: " . $result['db_time'] . "\n";
    echo "   DB Timezone: " . $result['db_timezone'] . "\n\n";
    
} catch (Exception $e) {
    echo "   Database error: " . $e->getMessage() . "\n\n";
}

// Test JavaScript timestamp
echo "6. JavaScript Timestamp Test:\n";
$jsTimestamp = $expiryTime->timestamp * 1000; // Convert to milliseconds
echo "   JS Timestamp: " . $jsTimestamp . "\n";
echo "   JS Date: " . date('Y-m-d H:i:s', $jsTimestamp / 1000) . "\n\n";

echo "=== TIMEZONE TEST COMPLETED ===\n";
?>