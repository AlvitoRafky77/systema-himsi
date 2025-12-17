# Systema HIMSI

<p align="center">
  <strong>Sistem E-Commerce HIMSI (Himpunan Mahasiswa Sistem Informasi)</strong>
</p>

<p align="center">
  Website e-commerce untuk penjualan merchandise, makanan, dan minuman HIMSI
</p>

---

## 📋 Tentang Proyek

**Systema HIMSI** adalah aplikasi web e-commerce yang dikembangkan menggunakan Laravel 12. Website ini memungkinkan mahasiswa untuk membeli berbagai produk HIMSI seperti merchandise, makanan, dan minuman. Proyek ini dibuat sebagai bagian dari mata kuliah **Proyek Perangkat Lunak** di Telkom University Kampus Jakarta.

## ✨ Fitur Utama

### 👤 Fitur User
- **Autentikasi** - Register, Login, Logout
- **Manajemen Profil** - Edit dan update profil pengguna
- **Katalog Produk** - Lihat produk berdasarkan kategori (Merchandise, Makanan, Minuman)
- **Detail Produk** - Informasi lengkap produk dengan gambar dan deskripsi
- **Keranjang Belanja (Cart)** - Tambah, edit, dan hapus produk dari keranjang
- **Checkout** - Proses pembelian produk
- **Review Produk** - Berikan ulasan untuk produk yang dibeli
- **Pencarian** - Cari produk berdasarkan nama
- **Halaman Kontak** - Kirim pesan/pertanyaan ke admin
- **Halaman About** - Informasi tentang HIMSI

### 🔧 Fitur Admin
- **Dashboard Admin** - Panel kontrol untuk admin
- **Manajemen Produk** - CRUD (Create, Read, Update, Delete) produk
- **Manajemen Kontak** - Lihat dan hapus pesan dari user

## 🛠️ Teknologi yang Digunakan

| Kategori | Teknologi |
|----------|-----------|
| **Backend** | PHP 8.2, Laravel 12 |
| **Frontend** | Blade Template, Tailwind CSS 4.0 |
| **Build Tool** | Vite 6.2 |
| **Database** | MySQL |
| **Package Manager** | Composer, NPM |

## 📁 Struktur Proyek

```
systema-himsi/
├── app/
│   ├── Http/Controllers/     # Controller aplikasi
│   │   ├── Admin/            # Controller untuk admin
│   │   ├── AuthController    # Autentikasi user
│   │   ├── CartController    # Keranjang belanja
│   │   ├── CheckoutController# Proses checkout
│   │   ├── ProdukController  # Manajemen produk
│   │   ├── ReviewController  # Review produk
│   │   └── ...
│   └── Models/               # Model database
│       ├── User.php
│       ├── Produk.php
│       ├── Cart.php
│       ├── Review.php
│       └── Kontak.php
├── database/
│   ├── migrations/           # Migrasi database
│   └── seeders/              # Seeder data
├── resources/views/          # Blade templates
│   ├── admin/                # View untuk admin
│   ├── auth/                 # View autentikasi
│   ├── cart/                 # View keranjang
│   ├── checkout/             # View checkout
│   ├── produk/               # View produk
│   └── ...
├── routes/web.php            # Definisi routing
└── public/                   # Assets publik
```

## ⚙️ Instalasi & Setup

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone <repository-url>
   cd systema-himsi
   ```

2. **Install dependencies PHP**
   ```bash
   composer install
   ```

3. **Install dependencies Node.js**
   ```bash
   npm install
   ```

4. **Salin file environment**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Konfigurasi database**
   
   Edit file `.env` dan sesuaikan konfigurasi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=systema_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Import database** (opsional - gunakan file SQL yang tersedia)
   ```bash
   # Import dari folder "Database Systema"
   mysql -u root -p systema_db < "Database Systema/systema_db.sql"
   ```

   **Atau jalankan migrasi dan seeder:**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

8. **Link storage**
   ```bash
   php artisan storage:link
   ```

9. **Build assets**
   ```bash
   npm run build
   ```

10. **Jalankan server**
    ```bash
    php artisan serve
    ```

11. Buka browser dan akses `http://localhost:8000`

## 🚀 Menjalankan Development Server

Untuk development dengan hot-reload:

```bash
# Terminal 1 - Laravel server
php artisan serve

# Terminal 2 - Vite dev server
npm run dev
```

## 👥 Tim Pengembang

Proyek ini dikembangkan oleh mahasiswa Telkom University Kampus Jakarta sebagai tugas mata kuliah **Proyek Perangkat Lunak** Semester 6.

## 📄 Lisensi

Proyek ini dibuat untuk keperluan akademik.
