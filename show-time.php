<?php
// Show current time in different formats
date_default_timezone_set('Asia/Jakarta');

echo "=== WAKTU SAAT INI ===\n\n";

echo "📅 Tanggal & Waktu:\n";
echo "   " . date('d F Y, H:i:s') . " WIB\n\n";

echo "⏰ Format Countdown:\n";
$now = time();
$expiry = $now + (5 * 60); // 5 minutes from now

echo "   Sekarang: " . date('H:i:s', $now) . "\n";
echo "   Expired: " . date('H:i:s', $expiry) . "\n";

$timeLeft = $expiry - $now;
$minutes = floor($timeLeft / 60);
$seconds = $timeLeft % 60;

echo "   Sisa: " . sprintf('%d:%02d', $minutes, $seconds) . "\n\n";

echo "🌍 Timezone Info:\n";
echo "   PHP Timezone: " . date_default_timezone_get() . "\n";
echo "   UTC Offset: " . date('P') . "\n\n";

echo "=== SELESAI ===\n";
?>