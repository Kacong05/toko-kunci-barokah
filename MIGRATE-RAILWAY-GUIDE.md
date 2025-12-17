# 🚀 Cara Migrate Database di Railway

## Masalah
`mysql.railway.internal` hanya bisa diakses dari dalam Railway network, tidak bisa dari komputer lokal.

## Solusi: Migrate dari Railway Dashboard

### Cara 1: Otomatis via Procfile (RECOMMENDED)

Procfile Anda sudah diset untuk auto-migrate saat deploy:
```
web: php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=$PORT
```

**Langkah:**
1. Push Procfile ke GitHub:
   ```bash
   git add Procfile
   git commit -m "Add auto migration"
   git push origin main
   ```

2. Railway akan auto-redeploy dan menjalankan migration + seeder

3. Tunggu 2-5 menit, lalu buka: `https://web-production-4c457.up.railway.app`

4. Login dengan:
   - Email: `admin@tokokuncibarokah.com`
   - Password: `admin123`

---

### Cara 2: Manual via Railway Dashboard

1. **Buka Railway Dashboard**
2. **Klik service "web"**
3. **Klik tab "Deployments"**
4. **Klik deployment yang sedang running (paling atas)**
5. **Klik tombol "View Logs"**
6. **Cari tombol atau menu "Run Command" / "Shell" / "Terminal"**
7. **Jalankan command:**
   ```bash
   php artisan migrate --force
   php artisan db:seed --force
   ```

---

### Cara 3: Trigger Redeploy

Jika Procfile sudah di-push:

1. **Di Railway Dashboard → Service "web"**
2. **Klik tab "Settings"**
3. **Scroll ke bawah, cari "Redeploy"**
4. **Klik tombol "Redeploy"**
5. Railway akan deploy ulang dan auto-migrate

---

## Verifikasi Migration Berhasil

Setelah migration selesai, cek:

1. **Buka website:** `https://web-production-4c457.up.railway.app`
2. **Tidak ada error 500** ✅
3. **Halaman login muncul** ✅
4. **Bisa login dengan admin credentials** ✅

---

## Troubleshooting

### Jika masih error 500:
1. Cek logs di Railway Dashboard → Service "web" → Logs
2. Pastikan environment variables sudah benar
3. Pastikan `APP_KEY` sudah di-set

### Jika tidak bisa login:
- Seeder mungkin belum jalan
- Jalankan manual: `php artisan db:seed --force` di Railway

---

## Next Steps

Setelah migration berhasil:
1. ✅ Test login admin
2. ✅ Test buat pesanan
3. ✅ Test kirim pesan
4. ✅ Test rating
5. ✅ Test notifikasi
6. ✅ Test forgot password

**Website Anda siap digunakan!** 🎉
