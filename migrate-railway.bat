@echo off
echo ========================================
echo   MIGRATE DATABASE KE RAILWAY MYSQL
echo ========================================
echo.

REM Backup .env asli
if exist .env (
    copy /Y .env .env.backup
    echo [OK] Backup .env ke .env.backup
)

REM Gunakan .env.railway
copy /Y .env.railway .env
echo [OK] Menggunakan .env.railway
echo.

echo Menjalankan migration...
php artisan migrate --force
echo.

echo Menjalankan seeder (membuat admin user)...
php artisan db:seed --force
echo.

REM Restore .env asli
if exist .env.backup (
    copy /Y .env.backup .env
    del .env.backup
    echo [OK] Restore .env asli
)

echo.
echo ========================================
echo   MIGRATION SELESAI!
echo ========================================
echo.
echo Login dengan:
echo Email: admin@tokokuncibarokah.com
echo Password: admin123
echo.
pause
