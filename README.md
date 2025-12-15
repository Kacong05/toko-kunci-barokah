# 🔑 Toko Kunci Barokah

Sistem manajemen toko kunci berbasis web dengan Laravel 12 dan Tailwind CSS.

## ✨ Fitur

### User
- 🏠 Dashboard dengan informasi lengkap
- 📦 Pemesanan layanan kunci
- ⭐ Rating & Review
- 💬 Kontak form
- 🗺️ Lokasi toko dengan maps
- 🌓 Dark mode support

### Admin
- 📊 Dashboard dengan statistik
- 👥 Manajemen user
- 📋 Manajemen pesanan
- ⭐ Manajemen rating
- 📧 Manajemen pesan kontak
- 🔔 Sistem notifikasi real-time

## 🛠️ Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Blade Templates, Alpine.js, Tailwind CSS
- **Database**: MySQL
- **Maps**: Leaflet.js
- **Icons**: Heroicons

## 📋 Requirements

- PHP 8.2+
- Composer
- Node.js 18+
- MySQL 8.0+

## 🚀 Installation (Local)

### 1. Clone Repository
```bash
git clone https://github.com/username/toko-kunci-barokah.git
cd toko-kunci-barokah
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
Update `.env` dengan kredensial database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toko_kunci_barokah
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations & Seeders
```bash
php artisan migrate
php artisan db:seed
```

### 6. Build Assets
```bash
npm run build
```

### 7. Start Development Server
```bash
php artisan serve
```

Buka browser: `http://localhost:8000`

## 👤 Default Login

### Admin
- Email: `admin@tokokuncibarokah.com`
- Password: `admin123`

### User
- Daftar melalui halaman register

## 🌐 Deploy ke Railway

Lihat panduan lengkap di [DEPLOYMENT.md](DEPLOYMENT.md)

### Quick Deploy
1. Push ke GitHub
2. Connect ke Railway
3. Add MySQL database
4. Set environment variables
5. Deploy!

## 📁 Struktur Project

```
toko-kunci-barokah/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin controllers
│   │   ├── Auth/           # Authentication
│   │   ├── ContactController.php
│   │   ├── PemesananController.php
│   │   └── RatingController.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Order.php
│   │   ├── Contact.php
│   │   ├── Rating.php
│   │   └── Notification.php
│   └── Middleware/
│       └── IsAdmin.php
├── resources/
│   ├── views/
│   │   ├── admin/          # Admin views
│   │   ├── auth/           # Auth views
│   │   ├── layouts/        # Layouts
│   │   ├── pemesanan/      # Order views
│   │   ├── rating/         # Rating views
│   │   └── dashboard.blade.php
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   └── auth.php
├── database/
│   ├── migrations/
│   └── seeders/
└── public/
```

## 🎨 Fitur Unggulan

### 1. Role-Based Access Control
- User biasa: Dashboard, Pemesanan, Rating
- Admin: Full access ke semua fitur

### 2. Real-time Notifications
- Notifikasi otomatis untuk pesanan baru
- Notifikasi untuk pesan kontak
- Notifikasi untuk rating baru

### 3. Dark Mode
- Sinkronisasi antar halaman
- Tersimpan di localStorage
- Smooth transition

### 4. Responsive Design
- Mobile-first approach
- Optimized untuk semua device
- Touch-friendly interface

### 5. Interactive Maps
- Leaflet.js integration
- Custom marker
- Popup dengan info toko

## 🔧 Configuration

### Email Setup (Production)
Update `.env` dengan SMTP credentials:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
```

### Storage Setup
```bash
php artisan storage:link
```

## 📝 API Endpoints

### Public Routes
- `GET /` - Redirect to login
- `GET /dashboard` - User dashboard
- `GET /pemesanan` - Order page
- `GET /rating` - Rating page

### Admin Routes (Protected)
- `GET /admin` - Admin dashboard
- `GET /admin/orders` - Manage orders
- `GET /admin/users` - Manage users
- `GET /admin/ratings` - Manage ratings
- `GET /admin/contacts` - Manage contacts

## 🧪 Testing

```bash
php artisan test
```

## 📦 Build for Production

```bash
composer install --optimize-autoloader --no-dev
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🤝 Contributing

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 👨‍💻 Developer

Developed with ❤️ by [Your Name]

## 📞 Support

Untuk bantuan dan pertanyaan:
- Email: support@tokokuncibarokah.com
- WhatsApp: +62 812-3456-7890

---

**Happy Coding! 🚀**
