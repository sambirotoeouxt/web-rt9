# Website RT 9 Sambiroto

Website resmi untuk menampilkan informasi RT 9 Desa Sambiroto dengan fitur lengkap untuk mengelola artikel, galeri, data penduduk, dan laporan keuangan.

## Fitur Utama

### Frontend (Publik)
- **Home** - Halaman utama dengan tampilan artikel terbaru dan galeri
- **Artikel** - Daftar artikel dengan pagination dan sistem komentar
- **Galeri** - Galeri foto dengan modal viewer
- **Data Penduduk** - Daftar penduduk RT 9 yang dapat dicari
- **Laporan Keuangan** - Transparansi keuangan kas RT 9
- **Sistem Komentar** - Pengunjung dapat meninggalkan komentar di setiap artikel

### Backend (Admin)
- **Dashboard** - Ringkasan statistik konten
- **Manajemen Artikel** - Tambah, edit, hapus artikel dengan upload gambar
- **Manajemen Galeri** - Upload dan kelola foto galeri
- **Manajemen Penduduk** - CRUD data penduduk
- **Manajemen Keuangan** - Pencatatan transaksi masuk dan keluar
- **Kelola Komentar** - Moderasi komentar pengunjung
- **Autentikasi Admin** - Sistem login dengan session

## Teknologi

- **Framework**: CodeIgniter 3
- **PHP**: 7.0+
- **Database**: MySQL/MariaDB
- **Frontend**: Bootstrap 5
- **Font Icon**: FontAwesome 6

## Persyaratan Sistem

- PHP 7.0 atau lebih tinggi
- MySQL 5.7 atau MariaDB 10.2+
- Web Server (Apache dengan mod_rewrite)
- cURL extension

## Instalasi

### 1. Download dan Extract

Download project dari GitHub dan extract ke folder web hosting:
```bash
git clone https://github.com/sambirotoeouxt/web-rt9.git
```

### 2. Setup Database

1. Buat database baru atau gunakan PHPMyAdmin
2. Import file `database/web_rt9.sql`:
   ```sql
   mysql -u root -p web_rt9 < database/web_rt9.sql
   ```

### 3. Konfigurasi Database

Edit file `application/config/database.php`:
```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'web_rt9',
    'dbdriver' => 'mysqli',
);
```

### 4. Konfigurasi Base URL

Edit file `application/config/config.php`:
```php
$config['base_url'] = 'http://yourdomain.com/';
// atau untuk localhost
$config['base_url'] = 'http://localhost/web-rt9/';
```

### 5. Permissions (Linux/Mac)

Beri permission pada folder yang diperlukan:
```bash
chmod 777 application/logs
chmod 777 uploads
```

### 6. Cek .htaccess

Pastikan file `.htaccess` sudah ada di root project. Jika belum ada, buat dengan isi:
```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /web-rt9/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>
```

## Akses Website

### Frontend (Publik)
```
http://localhost/web-rt9/
```

### Admin Panel
```
http://localhost/web-rt9/login
```

**Default Admin Login:**
- Username: `admin`
- Password: `admin123`

⚠️ **PENTING**: Ubah password admin setelah login pertama!

## Struktur Folder

```
web-rt9/
├── application/
│   ├── config/          # Konfigurasi aplikasi
│   ├── controllers/     # Controller CI3
│   ├── models/          # Model database
│   ├── views/           # View HTML
│   │   ├── admin/       # Admin panel views
│   │   ├── home/        # Home page
│   │   ├── artikel/     # Artikel views
│   │   ├── galeri/      # Galeri views
│   │   ├── keuangan/    # Keuangan views
│   │   ├── penduduk/    # Penduduk views
│   │   ├── login/       # Login page
│   │   └── template/    # Header & Footer
│   └── logs/            # Log files
├── assets/
│   ├── css/             # CSS files
│   ├── js/              # JavaScript files
│   └── images/          # Static images
├── uploads/
│   ├── artikel/         # Upload artikel
│   └── galeri/          # Upload galeri
├── database/
│   └── web_rt9.sql      # Database SQL
├── system/              # CI3 system files
├── .htaccess            # URL rewrite
├── index.php            # Entry point
└── README.md            # Dokumentasi
```

## Menu Admin

1. **Dashboard** - Lihat ringkasan statistik
2. **Artikel**
   - Daftar artikel
   - Tambah artikel baru
   - Edit artikel
   - Hapus artikel
3. **Galeri**
   - Daftar galeri
   - Tambah foto
   - Hapus foto
4. **Data Penduduk**
   - Daftar penduduk
   - Tambah penduduk
   - Edit data penduduk
   - Hapus penduduk
5. **Keuangan**
   - Laporan keuangan
   - Tambah transaksi
   - Edit transaksi
   - Hapus transaksi
6. **Komentar**
   - Kelola komentar
   - Hapus komentar

## Fitur Utama

### 1. Sistem Autentikasi
- Login dengan username dan password
- Password di-hash menggunakan bcrypt
- Session management
- Auto logout

### 2. CRUD Operations
- Create (Tambah data)
- Read (Lihat data)
- Update (Edit data)
- Delete (Hapus data)

### 3. Upload Gambar
- Support format JPG, PNG, GIF
- Validasi ukuran (max 2MB)
- Auto naming dengan timestamp

### 4. Pagination
- Artikel: 6 per halaman
- Galeri: 12 per halaman
- Penduduk: 10 per halaman
- Keuangan: 20 per halaman

### 5. Sistem Komentar
- Pengunjung dapat berkomentar di setiap artikel
- Admin moderasi komentar
- Validasi email dan nama

### 6. Responsive Design
- Mobile-friendly interface
- Bootstrap 5 framework
- Optimal di semua ukuran layar

### 7. Transparansi Keuangan
- Laporan pemasukan dan pengeluaran
- Kalkulasi otomatis saldo
- Filter berdasarkan tanggal

## Troubleshooting

### 404 Not Found
- Pastikan `.htaccess` sudah benar
- Enable `mod_rewrite` di Apache
- Cek `base_url` di config

### Database Connection Error
- Verifikasi hostname, username, password database
- Pastikan database sudah dibuat
- Cek file `database/web_rt9.sql` sudah di-import

### Upload Image Error
- Pastikan folder `uploads/artikel` dan `uploads/galeri` ada
- Beri permission 777 pada folder uploads
- Cek ukuran file (max 2MB)

### Login Error
- Pastikan browser menerima cookies
- Clear browser cache dan cookies
- Cek apakah session folder ada permission

## Security Notes

⚠️ **PENTING untuk Production:**

1. **Ubah Password Admin**
   ```php
   // Gunakan password_hash() untuk generate password yang aman
   password_hash('password_baru', PASSWORD_BCRYPT)
   ```

2. **Disable Debug Mode**
   ```php
   // application/config/config.php
   define('ENVIRONMENT', 'production');
   ```

3. **Gunakan HTTPS**
   - Aktifkan SSL/TLS certificate
   - Update base_url menjadi https://

4. **Backup Database**
   - Backup database secara berkala
   - Simpan backup di tempat aman

5. **Update Reguler**
   - Update CodeIgniter ke versi terbaru
   - Update dependencies

## Support & Dokumentasi

- **CodeIgniter**: https://codeigniter.com/user_guide/
- **Bootstrap**: https://getbootstrap.com/docs/
- **MySQL**: https://dev.mysql.com/doc/

## License

MIT License - Bebas digunakan untuk keperluan personal dan komersial.

## Author

Dibuat oleh: Sambiroto RT 9 Development Team

---

**Terakhir diupdate**: 2024
