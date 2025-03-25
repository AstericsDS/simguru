# 🏢 Manajemen Gedung dan Ruang

Aplikasi ini digunakan untuk mendata semua ruangan yang tersedia di **Universitas Negeri Jakarta**. Aplikasi ini berfungsi sebagai sistem inventaris untuk mencatat informasi mengenai ruangan yang ada, seperti kapasitas, fasilitas, dan lokasi.

Dengan aplikasi ini, pengguna dapat:
- Melihat daftar ruangan yang tersedia di universitas.
- Menambahkan, mengedit, dan menghapus data ruangan.
- Menyimpan informasi detail ruangan seperti kapasitas, fasilitas, dan lokasi.
- Mengelola data dengan antarmuka yang intuitif dan sistem berbasis Laravel.

Aplikasi ini dikembangkan menggunakan Laravel, Livewire, dan Tailwind serta dapat diintegrasikan dengan database untuk menyimpan data ruangan secara efisien.


## 📦 Persyaratan

Sebelum melakukan instalasi, pastikan anda memenuhi persyaratan berikut:

- PHP >= 8.x
- Composer
- Laravel >= 10.x
- MySQL
- Node.js & NPM

## 🚀 Instalasi

1. **Kloning repositori**  
   ```sh
   git clone https://github.com/your-username/your-laravel-app.git
   cd your-laravel-app
2. **Install dependensi**
   ```
   composer install
   npm install
   ```
3. **Buat file .env**<br><br>
   **🐧 Linux**
   ```sh
   cp .env.example .env
   ```
   **🖥️ Windows**
   ```batch
   copy .env.example .env
   ```
4. **Hasilkan application key**
   ```sh
   php artisan key:generate
   ```
5. **Siapkan database**
   ```sh
   php artisan migrate --seed
6. **Jalankan aplikasi**
   ```sh
   php artisan serve
   npm run dev
   ```