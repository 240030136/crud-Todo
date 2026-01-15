# 📋 Project CRUD ToDo List

## 📖 Deskripsi Singkat
Project **CRUD ToDo List** merupakan aplikasi berbasis web yang digunakan untuk mengelola daftar tugas (*to-do list*).  
Aplikasi ini menerapkan konsep **CRUD (index, create, edit, delete, toggle_status)** yang memungkinkan pengguna untuk:
- Menampilkan seluruh daftar tugas (ToDo) yang      tersimpan di dalam sistem.
- Menambahkan data tugas baru ke dalam database.
- Mengubah atau memperbarui data tugas yang sudah ada.
- Menghapus data tugas yang tidak diperlukan dari sistem.
- Mengubah status tugas secara langsung, misalnya dari pending menjadi done atau sebaliknya.

Project ini dibuat sebagai bagian dari pembelajaran dan implementasi pengembangan aplikasi web serta penggunaan GitHub sebagai version control dan dokumentasi project.

---

## 👥 Daftar Anggota
- I Dewa Gede Windraya Nandana (240030158), Username : dewegedewindraya250506, Peran : membuat css untuk fungsi delete dan membuat readme.md
- Made Dendy Ari Swastika (240030136), Username : 240030136, Peran : membuat struktur aplikasi, membuat koneksi ke database, membantu dalam pembuatan css, membuat fungsi (edit, create, delete), membuat fitur search
- Kadek Putra Sudana Jaya (240030160), Username : KadekPutra240030160, Peran : membuat css (fungsi create dan list data), membuat fungsi toggle status dan css nya, membantu membuat readme.md

---

## 🛠️ Lingkungan Pengembangan
Dalam pengembangan project **CRUD ToDo List**, digunakan lingkungan dan teknologi sebagai berikut:

- **Bahasa Pemrograman**: PHP  
- **Database**: MySQL  
- **Web Server**: Apache (XAMPP)  
- **Frontend**: HTML, CSS, Java 
- **Text Editor / IDE**: Visual Studio Code  
- **Version Control**: Git dan GitHub  
- **Browser**: Google Chrome  

---

## 🚀 Hasil Pengembangan
Berikut adalah hasil pengembangan dan implementasi modul / fitur utama pada aplikasi:

### 1. Modul Create (Tambah ToDo)
Pengguna dapat menambahkan data tugas baru melalui form input yang kemudian disimpan ke dalam database.

### 2. Modul Read (Tampilkan ToDo)
Sistem menampilkan seluruh daftar tugas yang tersimpan di database secara realtime.

### 3. Modul Update (Edit ToDo)
Pengguna dapat mengubah data tugas seperti judul atau deskripsi.

### 4. Modul Delete (Hapus ToDo)
Pengguna dapat menghapus tugas yang sudah tidak diperlukan.

### 5. Status ToDo
Setiap tugas memiliki status **pending** atau **done** untuk mempermudah pengelolaan tugas.

### 6. Pencarian ToDo
Pengguna dapat mencari tugas berdasarkan nama todo yang diinginkan.

---

## 📂 Struktur Folder
Berikut adalah struktur folder dalam project **CRUD ToDo List** beserta penjelasannya:

```bash
crud-todo/
│
├── config/
│   └── database.php
│
├── public/
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.css
│   │   └── js/
│   │       └── app.js
│   │
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   ├── delete.php
│   └── toggle_status.php
│
├── schema.sql
└── README.md

---

## ⚙️ CARA INSTALASI DAN MENJALANKAN APLIKASI

### Prasyarat
Sebelum menjalankan aplikasi ini, pastikan telah terpasang:
- XAMPP (Apache & MySQL)
- MySQL WorkBench
- VisualStudioCode
- PHP versi 7.4 atau lebih baru
- Web browser (Chrome / Firefox)
- Git (opsional, jika clone repository)


### Cara Instalasi
CARA PERTAMA :
- Buka VS Code
- Buka Command Palette dengan cara Ctrl + Shift + P
- Ketik Git : Clone, tekan enter
- Masukan URL repo GitHub : https://github.com/240030136/crud-Todo
- Pilih lokasi folder untuk tempat menyimpan file crud-Todo
- akan muncul notif Open repository dan pilih YES

CARA KEDUA :
- Buka link GitHub https://github.com/240030136/crud-Todo
- Download file dalam bentuk ZIP
- Ekstrak file ZIP tersebut lalu pilih lokasi folder untuk tempat menyimpan file crud-Todo
- Buka folder crud-Todo melalui VS Code

### Membuat Database di MySQL 
- Buka Aplikasi My SQl WorkBench
- Buat MySQl Connectioin
- Pilih menu file dan pilih Open SQL Script
- Cari folder crud-Todo dan pilih file yang bernama schema.sql lalu klik open
- Execute semua code yang ada pada file tersebut

### Menjalankan perintah untuk akses localhost
- Buka VS Code
- Buka folder crud-Todo 
- Buka Terminal yang ada pada VS Code 
- Ketik : cd public
- Ketik : php -S localhost:8000
- Buka Browser dan ketik http:\\localhost:8000 di alamat browser
- Dan ToDo List siap digunakan
