### 📄 `README.md`

````markdown
# Sistem Pendukung Keputusan Pemberian Sanksi Siswa Menggunakan Rule Base

🎯 **Deskripsi Singkat:**

Proyek ini merupakan aplikasi berbasis web yang bertujuan untuk membantu pihak sekolah dalam menentukan jenis sanksi kepada siswa berdasarkan pelanggaran yang dilakukan. Sistem menggunakan pendekatan *Rule-Based System*, di mana aturan-aturan pelanggaran dan sanksi telah dirancang dan disimpan dalam basis data untuk kemudian dianalisis secara otomatis oleh sistem.

---

## 🧠 Metodologi

Sistem ini mengadopsi pendekatan **Rule-Based Reasoning (RBR)** yang memungkinkan mesin inferensi mencocokkan pelanggaran dengan aturan yang telah ditetapkan sebelumnya. Dengan metode ini, proses pemberian sanksi menjadi lebih objektif, efisien, dan konsisten.

---

## 💻 Teknologi yang Digunakan

- **Framework Backend:** Laravel (PHP)
- **Frontend:** Blade (HTML, CSS, JavaScript)
- **Database:** MySQL / MariaDB
- **Package Manager:** Composer (PHP) dan npm (JavaScript)
- **Environment:** Localhost (XAMPP / Laravel built-in server)

---

## 📁 Struktur Direktori

```bash
Spk_RuleBase/
├── app/                  # Kontroler dan logika backend
├── public/               # Akses file publik
├── resources/            # View (Blade template)
├── routes/               # Routing web (web.php)
├── database/             # Migration dan Seeder
├── .env                  # File environment
└── ...
````

---

## ⚙️ Cara Menjalankan Proyek Ini

Ikuti langkah-langkah berikut untuk menjalankan proyek di lokal:

### 1. Clone Repositori

```bash
git clone https://github.com/wawanfrigiawan/Sistem-Pendukung-Keputusan-Pemberian-Sanksi-Siswa-Menggunakan-Rule-Base.git
cd Sistem-Pendukung-Keputusan-Pemberian-Sanksi-Siswa-Menggunakan-Rule-Base/Spk_RuleBase
```

### 2. Install Dependensi PHP

Pastikan kamu sudah menginstall Composer. Jalankan:

```bash
composer install
```

### 3. Install Dependensi Frontend

Pastikan kamu sudah menginstall Node.js & npm. Jalankan:

```bash
npm install
npm run dev
```

### 4. Setup Environment

Copy `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Kemudian buka `.env` dan atur konfigurasi database sesuai kebutuhanmu:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=spk_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate App Key

```bash
php artisan key:generate
```

### 6. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 7. Jalankan Server

```bash
php artisan serve
```

Buka browser dan akses:

```
http://localhost:8000
```

---

## 👨‍🎓 Tentang Proyek Ini

* **Judul:** Sistem Pendukung Keputusan Pemberian Sanksi Siswa Menggunakan Rule Base
* **Jenis:** Tugas Akhir
* **Nama:** Muhammad Akbar
* **Universitas:** Universitas Sulawesi Barat
* **Program Studi:** Informatika

---

## 📜 Lisensi

Proyek ini dikembangkan untuk keperluan akademik dan dapat digunakan kembali untuk pembelajaran. Silakan menghubungi pengembang untuk penggunaan di luar konteks akademik.

---

## ✉️ Kontak

Untuk pertanyaan, silakan hubungi:

* Email: \wawanfirgiawan9@gmail.com
* GitHub: [https://github.com/wawanfrigiawan](https://github.com/wawanfrigiawan)

````
