# 🚀 Panduan Deploy ke Railway

## Persiapan

### 1. Push ke GitHub
```bash
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin https://github.com/username/toko-kunci-barokah.git
git push -u origin main
```

### 2. Buat Akun Railway
1. Kunjungi [railway.app](https://railway.app)
2. Sign up dengan GitHub
3. Authorize Railway untuk akses repository

## Deploy Aplikasi

### Step 1: Buat Project Baru
1. Klik "New Project"
2. Pilih "Deploy from GitHub repo"
3. Pilih repository `toko-kunci-barokah`

### Step 2: Tambah MySQL Database
1. Di project Railway, klik "New"
2. Pilih "Database" → "Add MySQL"
3. Railway akan otomatis membuat database

### Step 3: Set Environment Variables
Di tab "Variables", tambahkan:

```env
APP_NAME=Toko Kunci Barokah
APP_ENV=production
APP_KEY=base64:qTElUYv6Lb6GiekI3t78McLbsR50l8BliSaR/s4UR1Y=
APP_DEBUG=false
APP_URL=${{RAILWAY_PUBLIC_DOMAIN}}

DB_CONNECTION=mysql
DB_HOST=${{MYSQL_HOST}}
DB_PORT=${{MYSQL_PORT}}
DB_DATABASE=${{MYSQL_DATABASE}}
DB_USERNAME=${{MYSQL_USER}}
DB_PASSWORD=${{MYSQL_PASSWORD}}

SESSION_DRIVER=database
QUEUE_CONNECTION=database
CACHE_STORE=database

# Email (Opsional - Update dengan kredensial Anda)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@tokokuncibarokah.com
MAIL_FROM_NAME=Toko Kunci Barokah
```

**Catatan:** Railway akan otomatis mengisi variabel `MYSQL_*` dari database yang dibuat.

### Step 4: Generate APP_KEY (Jika Belum Ada)
1. Buka Railway CLI atau terminal lokal
2. Jalankan: `php artisan key:generate --show`
3. Copy hasilnya ke `APP_KEY` di Railway

### Step 5: Deploy
1. Railway akan otomatis deploy setelah push ke GitHub
2. Tunggu proses build selesai (5-10 menit)
3. Klik "View Logs" untuk melihat progress

### Step 6: Generate Domain
1. Di tab "Settings"
2. Klik "Generate Domain"
3. Railway akan memberikan domain: `your-app.railway.app`

### Step 7: Run Migrations
Setelah deploy berhasil, jalankan migration:
1. Buka Railway CLI atau gunakan "Run Command"
2. Jalankan: `php artisan migrate --force`

### Step 8: Seed Database (Opsional)
Untuk membuat admin default:
```bash
php artisan db:seed --force
```

## Verifikasi

1. Buka domain Railway Anda
2. Test login dengan:
   - Email: `admin@tokokuncibarokah.com`
   - Password: `admin123`

## Update Aplikasi

Setiap kali push ke GitHub, Railway akan otomatis re-deploy:
```bash
git add .
git commit -m "Update feature"
git push origin main
```

## Troubleshooting

### Error: "APP_KEY not set"
- Generate key baru: `php artisan key:generate --show`
- Set di Railway Variables

### Error: Database Connection
- Pastikan variabel `MYSQL_*` sudah terisi otomatis
- Restart service

### Error: 500 Internal Server Error
- Check logs: Railway Dashboard → Logs
- Set `APP_DEBUG=true` sementara untuk melihat error detail

### Error: Assets Not Loading
- Pastikan `npm run build` berhasil
- Check `APP_URL` sudah benar

## Custom Domain (Opsional)

1. Beli domain di Niagahoster/Namecheap
2. Di Railway Settings → Domains
3. Add Custom Domain
4. Update DNS records sesuai instruksi Railway

## Monitoring

- **Logs**: Railway Dashboard → Logs
- **Metrics**: Railway Dashboard → Metrics
- **Database**: Railway Dashboard → MySQL → Data

## Biaya

- **Free Tier**: $5 credit/bulan
- **Hobby Plan**: $5/bulan (unlimited usage)
- **Pro Plan**: $20/bulan (team features)

## Support

Jika ada masalah:
1. Check Railway Logs
2. Check Laravel Logs: `storage/logs/laravel.log`
3. Railway Discord: [discord.gg/railway](https://discord.gg/railway)

---

**Selamat! Aplikasi Anda sudah online! 🎉**
