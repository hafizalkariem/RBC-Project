@echo off
echo === QUICK PAYMENT TESTING ===
echo.

echo 1. Testing sync command...
php artisan payments:sync-expired
echo.

echo 2. Checking payment summary...
curl -s "http://localhost/RBC-Project/public/debug/payment-summary" | php -r "echo json_encode(json_decode(file_get_contents('php://stdin')), JSON_PRETTY_PRINT);"
echo.

echo 3. Checking pending orders...
curl -s "http://localhost/RBC-Project/public/debug/pending-orders" | php -r "echo json_encode(json_decode(file_get_contents('php://stdin')), JSON_PRETTY_PRINT);"
echo.

echo Testing completed!
pause