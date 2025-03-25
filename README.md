# 🎓 **Absensi Guru** 📌  

Sistem **Absensi Guru** berbasis web menggunakan **Laravel**, dirancang untuk mencatat dan mengelola kehadiran guru secara efisien. Mendukung metode **QR Code & Manual**, dengan laporan real-time dan fitur rekapitulasi otomatis!  

![Laravel](https://img.shields.io/badge/Laravel-10-red?style=flat&logo=laravel)  
![PHP](https://img.shields.io/badge/PHP-8-blue?style=flat&logo=php)  
![MySQL](https://img.shields.io/badge/MySQL-Database-orange?style=flat&logo=mysql)  
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple?style=flat&logo=bootstrap)  

---

## 🚀 **Fitur Utama**
✅ **Role-Based Access Control** (Admin, Guru, Kepala Sekolah)  
✅ **Absensi Manual & QR Code**  
✅ **Jam Masuk & Keluar Otomatis**  
✅ **Rekap Kehadiran Bulanan & Semester**  
✅ **Ekspor Data ke Excel**  
✅ **Dashboard Interaktif** dengan Statistik Kehadiran  
✅ **Notifikasi & Monitoring Kehadiran**  

---

## 🏗️ **Teknologi yang Digunakan**
🔹 **Laravel 10** – Framework PHP  
🔹 **MySQL** – Database Management  
🔹 **Blade** – Laravel Templating Engine  
🔹 **Bootstrap / Tailwind CSS** – Frontend Styling  
🔹 **Maatwebsite Excel** – Ekspor Data  
🔹 **QR Code Generator** – Untuk absensi berbasis kode QR  

---

## 📥 **Instalasi & Konfigurasi**
### 1️⃣ **Clone Repository**
```sh
git clone https://github.com/Firmansyah441/Absensi-guru.git
cd Absensi-guru
```
### 2️⃣ **Install Dependencies**
```sh
composer install
npm install
```
### 3️⃣ **Konfigurasi Environment**
- Salin file `.env.example` dan ubah ke `.env`
- Atur koneksi database di `.env`
- Generate key Laravel  
  ```sh
  php artisan key:generate
  ```

### 4️⃣ **Setup Database**
```sh
php artisan migrate --seed
```

### 5️⃣ **Jalankan Server**
```sh
php artisan serve
```
Buka di browser: **`http://127.0.0.1:8000`** 🎉  

---

## 📊 **Struktur Database**
📌 **Tabel Utama**:  
- **`gurus`** → Data guru  
- **`tapels`** → Tahun pelajaran  
- **`absens`** → Rekap absensi  
- **`liburs`** → Hari libur sekolah  
- **`qr_codes`** → Data QR Code  

---

## 🤝 **Kontribusi**
🚀 **Pull Request** dan **Issues** selalu diterima! Jika ada bug atau ide pengembangan, silakan buat **Issue** atau langsung kontribusi melalui **PR**.  

---

## 📜 **Lisensi**
Proyek ini dirilis di bawah lisensi **MIT License** 📄  

💡 **Dikembangkan oleh:** [Firmansyah441](https://github.com/Firmansyah441)  

🔥 **Absensi Guru - Meningkatkan Efisiensi Kehadiran Guru dengan Teknologi!** 🔥  

---

Thanks
