# Toko Kunci Barokah

Aplikasi web untuk Toko Kunci Barokah.

## Fitur

- Manajemen Pengguna (Admin & User)
- Pemesanan Kunci
- Rating & Review
- Kontak & Pesan
- Notifikasi Real-time
- Dashboard Admin
- Peta Lokasi Toko

## Teknologi

- Laravel 11
- MySQL
- Tailwind CSS
- Leaflet Maps

## Instalasi

1. Clone repository
```bash
git clone https://github.com/username/toko-kunci-barokah.git
cd toko-kunci-barokah
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Setup database
```bash
php artisan migrate
php artisan db:seed
```

5. Build assets
```bash
npm run build
```

6. Jalankan aplikasi
```bash
php artisan serve
```

## Login Default

- Email: `admin@tokokuncibarokah.com`
- Password: `admin123`

## License

MIT License
