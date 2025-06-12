# SekolahApp

Aplikasi manajemen data sekolah berbasis Laravel + Livewire.  
Fitur mencakup pengelolaan guru, siswa, kelas, dan autentikasi pengguna.

---

## 🛠 Tech Stack

- **Framework**: Laravel 10  
- **Livewire**: Komponen interaktif  
- **Tailwind CSS**: Styling UI  
- **Alpine.js**: Behavior frontend  
- **PHP**: 8.2.12  
- **Database**: MySQL  
- **Authentication**: Laravel Breeze  
- **Jetstream / Volt**: Jika digunakan, mendukung Livewire UI

---

## 🚀 Cara Menjalankan Aplikasi di Komputer Lokal

### 🔃 1. Clone Repository


git clone https://github.com/NicholasAdi24/sekolah-app.git
cd sekolahapp


---

### 📦 2. Install Dependencies


composer install
npm install


> Jika \`npm install\` gagal, pastikan sudah menginstall Node.js.

---

### 🔧 3. Salin File .env


cp .env.example .env


---

### 🔐 4. Generate App Key

php artisan key:generate


---

### 🛢 5. Setup Database

- Buat database baru di MySQL, contoh: \`manajemen_sekolah\`  
- Import file SQL:  
  **File**: \`manajemen_sekolah.sql\` (terlampir dalam repo)

---

### 🔨 6. Jalankan Migrasi dan Seeder (opsional jika sudah import SQL)


php artisan migrate --seed


---

### 🔌 7. Jalankan Server Lokal

php artisan serve


Akses aplikasi di: [http://localhost:8000](http://localhost:8000)
