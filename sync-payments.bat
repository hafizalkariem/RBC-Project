@echo off
cd /d "c:\xampp\htdocs\RBC-Project"
php artisan payments:sync-expired
echo Payment sync completed at %date% %time%