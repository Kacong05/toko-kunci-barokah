# 🚀 Panduan Deploy Toko Kunci Barokah

## Platform yang Didukung
- Railway
- Heroku
- DigitalOcean App Platform
- AWS Elastic Beanstalk

## Deploy ke Railway

### 1. Persiapan
Pastikan semua file sudah di-commit ke GitHub:
```bash
git add .
git commit -m "Ready for deployment"
git push origin main
```

### 2. Buat Project di Railway
1. Buka [railway.app](https://railway.app)
2. Login dengan GitHub
3. Klik "New Project"
4. Pilih "Deploy from GitHub repo"
5. Pilih repository `toko-kunci-barokah`

### 3. Tambah MySQL Database
1. Di project Railway, klik "New"
2. Pilih "Database" → "Add MySQL"
3. Railway akan otomatis membuat database

### 4. Link Services
1. Klik service "web"
2. Klik tab "Settings"
3. Scroll ke "Service Variables"
4. Klik "Add Service" atau "Link Service"
5. Pilih MySQL service
6. Railway akan auto-inject database credentials

### 5. Set Environment Variables
Di service "web" → Tab "Variables", tambahkan:

```env
APP_NAME=Toko Kunci Barokah
APP_ENV=production
APP_KEY=base64:qTElUYv6Lb6GiekI3t78McLbsR50l8BliSaR/s4UR1Y=
APP_DEBUG=false
APP_URL=https://your-app.railway.app

SESSION_DRIVER=database
QUEUE_CONNECTION=database
CACHE_STORE=database

MAIL_MAILER=log
MAIL_FROM_ADDRESS=noreply@tokokuncibarokah.com
MAIL_FROM_NAME=Toko Kunci Barokah

LOG_CHANNEL=stack
LOG_LEVEL=error
```

**Database credentials akan otomatis di-inject dari MySQL service yang sudah di-link.**

### 6. Deploy
Railway akan otomatis:
1. Install Composer dependencies
2. Install npm packages
3. Build Tailwind CSS dengan Vite
4. Cache Laravel config
5. Run migrations dan seeders
6. Start aplikasi

### 7. Generate Domain
1. Di tab "Settings"
2. Klik "Generate Domain"
3. Railway akan memberikan domain: `your-app.railway.app`

### 8. Verifikasi
Buka domain Railway dan login dengan:
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

### CSS Tidak Load
- Pastikan `npm run build` berhasil di logs
- Set `APP_URL` dengan domain Railway yang benar
- Tambahkan `ASSET_URL` jika perlu

### Database Connection Error
- Pastikan MySQL service sudah di-link ke web service
- Cek database credentials di Variables tab
- Restart service jika perlu

### Migration Error
- Cek logs untuk error detail
- Pastikan database sudah online sebelum web service start
- Bisa manual run migration via Railway CLI

## Railway CLI (Opsional)

Install Railway CLI:
```bash
npm install -g @railway/cli
```

Login dan link project:
```bash
railway login
railway link
```

Run commands:
```bash
railway run php artisan migrate
railway run php artisan db:seed
```

## Monitoring

- **Logs**: Railway Dashboard → Service → Logs
- **Metrics**: Railway Dashboard → Service → Metrics
- **Database**: Railway Dashboard → MySQL → Data

## Biaya

- **Trial**: $5 credit gratis
- **Hobby**: $5/bulan
- **Pro**: $20/bulan

---

**Aplikasi siap di-deploy! 🎉**
