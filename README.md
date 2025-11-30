README.md
1. Deskripsi Aplikasi

Aplikasi ini adalah CRUD sederhana untuk mengelola data Produk. Pengguna dapat menambah, melihat, mengubah, dan menghapus data produk melalui antarmuka web berbasis PHP dan MySQL.

Entitas yang dipilih: produk
Fungsi utama aplikasi:

Create: menambah produk

Read: menampilkan daftar produk

Update: mengedit produk

Delete: menghapus produk

2. Spesifikasi Teknis

PHP: 8.x

DBMS: MySQL / MariaDB

Struktur Folder Singkat:

/config        → Koneksi database  
/app          
  /Entity     → Class Produk  
  /Repository → CRUD Produk  
/public        → index.php, form tambah/edit  
schema.sql     → Struktur tabel


Class Utama:

Database: menangani koneksi MySQL menggunakan PDO.

Entity (Produk): representasi data produk (id, nama, harga, deskripsi, foto).

Repository (ProdukRepository): berisi fungsi CRUD (insert, getAll, find, update, delete).

3. Instruksi Menjalankan Aplikasi
1. Import Database

Buka phpMyAdmin → Import → pilih schema.sql

Atau via terminal:

mysql -u root -p nama_database < schema.sql

2. Atur Konfigurasi Database

Edit file /config/database.php:

$host = "localhost";
$dbname = "crud_produk";
$username = "root";
$password = "";

3. Jalankan Aplikasi

Jika menggunakan PHP built-in server:

php -S localhost:8000 -t public

4. Akses di Browser
http://localhost:8000/index.php

4. Contoh Skenario Uji Singkat

Tambah Data

Isi form tambah produk → Simpan.

Tampilkan Data

Lihat daftar produk di halaman utama.

Ubah Data

Klik tombol Edit pada salah satu produk → ubah → Simpan.

Hapus Data

Klik Delete pada produk yang ingin dihapus.
