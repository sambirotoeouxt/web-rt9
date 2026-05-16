# PANDUAN SETUP WEB-RT9

## Langkah-Langkah Instalasi

### A. PERSIAPAN AWAL

1. **Pastikan Hosting Anda Memiliki:**
   - PHP 7.0 atau lebih tinggi
   - MySQL / MariaDB
   - cURL extension
   - mod_rewrite enabled (Apache)

2. **Download Project**
   - Clone dari GitHub atau download ZIP
   - Extract ke folder web hosting

### B. SETUP DATABASE

1. **Buka PHPMyAdmin** atau akses MySQL CLI

2. **Buat Database Baru:**
   ```sql
   CREATE DATABASE web_rt9;
   ```

3. **Import SQL File:**
   - Pilih database `web_rt9`
   - Klik "Import"
   - Pilih file `database/web_rt9.sql`
   - Klik "Go" / "Import"

   ATAU via CLI:
   ```bash
   mysql -u username -p password web_rt9 < database/web_rt9.sql
   ```

### C. KONFIGURASI APLIKASI

1. **Edit file `application/config/database.php`:**
   ```php
   $db['default'] = array(
       'hostname' => 'localhost',  // Usually localhost
       'username' => 'db_user',    // Your DB username
       'password' => 'db_pass',    // Your DB password
       'database' => 'web_rt9',    // Database name
       'dbdriver' => 'mysqli',
   );
   ```

2. **Edit file `application/config/config.php`:**
   ```php
   // Untuk domain
   $config['base_url'] = 'http://yourdomain.com/';
   
   // Atau untuk localhost
   $config['base_url'] = 'http://localhost/web-rt9/';
   
   // Untuk subfolder
   $config['base_url'] = 'http://yourdomain.com/web-rt9/';
   ```

3. **Check file `.htaccess`** (harus ada di root):
   ```
   <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteBase /web-rt9/
       RewriteCond %{REQUEST_FILENAME} !-f
       RewriteCond %{REQUEST_FILENAME} !-d
       RewriteRule ^(.*)$ index.php/$1 [L]
   </IfModule>
   ```

### D. FOLDER PERMISSIONS (Linux/Mac)

Beri permission read-write pada folder:
```bash
chmod 777 application/logs
chmod 777 uploads
chmod 777 uploads/artikel
chmod 777 uploads/galeri
```

### E. AKSES WEBSITE

**Website Frontend (Publik):**
```
http://yourdomain.com/
```

**Admin Panel:**
```
http://yourdomain.com/login
```

**Default Login:**
- Username: `admin`
- Password: `admin123`

⚠️ **LANGSUNG UBAH PASSWORD SETELAH LOGIN PERTAMA!**

## Cara Mengubah Password Admin

1. Login ke Admin Panel
2. Akses database via PHPMyAdmin
3. Buka table `admin`
4. Edit user `admin`
5. Ubah field `password` dengan hasil hash bcrypt:
   
   ```php
   <?php
   $password = 'password_baru_anda';
   $hash = password_hash($password, PASSWORD_BCRYPT);
   echo $hash;
   ?>
   ```

6. Copy hasil hash dan paste ke field password
7. Klik Update

## Troubleshooting

### Masalah: "Page Not Found" atau "404 Error"

**Solusi:**
1. Pastikan `.htaccess` ada di root project
2. Enable `mod_rewrite` di Apache:
   - Edit `.htaccess` atau `apache2.conf`
   - Pastikan `mod_rewrite` enabled
3. Cek `base_url` di `application/config/config.php`
4. Restart Apache

### Masalah: "Database Connection Error"

**Solusi:**
1. Cek hostname, username, password database
2. Pastikan database sudah dibuat
3. Pastikan file `database/web_rt9.sql` sudah di-import
4. Cek koneksi database dari terminal:
   ```bash
   mysql -u username -p password -h localhost web_rt9
   ```

### Masalah: "Cannot Upload Image"

**Solusi:**
1. Pastikan folder `uploads`, `uploads/artikel`, `uploads/galeri` ada
2. Beri permission 777:
   ```bash
   chmod 777 uploads
   chmod 777 uploads/artikel
   chmod 777 uploads/galeri
   ```
3. Cek ukuran file (max 2MB)
4. Cek format file (JPG, PNG, GIF)

### Masalah: "Login Tidak Bekerja"

**Solusi:**
1. Clear browser cache dan cookies
2. Pastikan browser menerima cookies
3. Cek session folder ada permission
4. Restart browser

### Masalah: "Pagination Tidak Bekerja"

**Solusi:**
1. Cek `base_url` sudah benar
2. Pastikan `.htaccess` berfungsi
3. Cek query string di URL (jangan gunakan `?page=`)

## FAQ

**Q: Bagaimana cara menambah artikel?**
A: Login ke Admin Panel > Artikel > Tambah Artikel > Isi form > Upload gambar > Simpan

**Q: Bagaimana cara moderasi komentar?**
A: Login ke Admin Panel > Komentar > Lihat komentar > Hapus jika spam

**Q: Bagaimana cara backup database?**
A: PHPMyAdmin > Pilih database `web_rt9` > Export > Format SQL > Go

**Q: Bagaimana cara mengubah judul website?**
A: Ubah di berbagai tempat:
- `application/views/template/header.php`
- `application/views/admin/template/header.php`
- File views lainnya

**Q: Apakah bisa menambah fitur baru?**
A: Ya, ikuti struktur MVC CodeIgniter 3

## Contact & Support

Jika ada pertanyaan atau masalah:
- Cek dokumentasi: https://codeigniter.com/
- Baca error message dengan seksama
- Check log file: `application/logs/`

---

Selamat menggunakan Web-RT9! 🎉
