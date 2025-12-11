📦 **17 COFFEE** – Tubes ProWeb Kelompok 5

17 COFFEE adalah aplikasi web untuk manajemen dan pemesanan menu minuman & makanan berbasis PHP + MySQL.
Aplikasi ini dibuat sebagai Tugas Besar (Tubes) untuk mata kuliah Pemrograman Web.

---

## 📌 Fitur Utama

### 🧑‍💻 Frontend User

* 📋 Halaman Home menampilkan daftar menu
* 🔎 Filter menu **food** dan **drink**
* 🛒 Keranjang belanja dengan update jumlah (+/-)
* 💵 Checkout melalui panel AJAX tanpa reload
* ✉️ Halaman **Contact Us** untuk mengirim pesan

### 🛠️ Backend / Admin

* 🔐 Autentikasi admin vs user
* 📥 Tambah menu (nama, harga, kategori, foto)
* 🗑 Hapus menu
* 🛠 Panel admin untuk kelola menu & feedback

### 🛒 Fitur Keranjang (Cart)

* Simpan data cart di **PHP session**
* Update jumlah item secara live
* Menghapus item dari keranjang
* Submit checkout ke database

---

## 📁 Struktur Folder

```
├── addCart.php                    # Proses tambah item ke cart
├── cart.js                        # Logic AJAX cart
├── cart_data.php                  # Render isi cart
├── checkout.php                   # Proses checkout ke DB
├── contact.php                    # Halaman contact form
├── food.php                       # Halaman food
├── drink.php                      # Halaman drink
├── home.php                       # Halaman utama
├── index.html / index.php         # Halaman login
├── navbar.php                     # Navigation component
├── navbarAdmin.php                # Navbar admin
├── register.html / refister.php   # Halaman register
├── updateCart.php                 # Update session cart
├── style.css / newStyle.css       # Styling
├── mysql.php                      # Koneksi database
├── cafe.sql                       # SQL schema & sample data
└── foto/                          # Folder gambar menu dan icon
```

---

## 🧠 Teknologi yang Digunakan

| Layer    | Teknologi                       |
| -------- | ------------------------------- |
| Backend  | PHP                             |
| Database | MySQL                           |
| Frontend | HTML, CSS, JavaScript           |
| AJAX     | Fetch API untuk cart & checkout |
| Session  | PHP session untuk cart & auth   |

---

## 🚀 Cara Instalasi (Development)

1. Clone project:

   ```bash
   git clone https://github.com/bayupranoto139-spec/tubes_proweb_kelompok_5.git
   cd tubes_proweb_kelompok_5
   ```

2. Import database:

   * Buka **cafe.sql** di MySQL / phpMyAdmin
   * Jalankan import schema + data sample

3. Konfigurasi koneksi:

   * Buka file `mysql.php`
   * Sesuaikan:

     ```php
     $mysql = new mysqli("localhost", "username", "password", "nama_database");
     ```

4. Jalankan server:

   * Jika pakai XAMPP / MAMP:

     ```
     http://localhost/nama_folder/
     ```

5. Buka di browser:

   * Halaman login: `index.html`
   * Register: `register.html`

---

## 🔐 Autentikasi

| User       | Role                               |
| ---------- | ---------------------------------- |
| Admin      | Admin bisa menambah/menghapus menu |
| User biasa | Bisa lihat menu & checkout         |

Session login disimpan di:

```php
$_SESSION["user_id"], $_SESSION["username"], $_SESSION["role"]
```

---

## 🔄 Alur Cart & Checkout

1. User klik ✚ “Pesan” → AJAX `addCart.php`
2. Data cart disimpan di `$_SESSION['cart']`
3. Panel cart buka via fetch `cart_data.php`
4. `updateCart.php` menangani plus / minus / hapus
5. `checkout.php` simpan data ke tabel `orders` dan `order_items`
6. Backend clear session cart

---

## 💬 Notifikasi UI

Notifikasi tampilkan seperti:

```js
showNotification("Item berhasil ditambahkan!", "success");
```

Dipanggil dari `cart.js`.

---

## 📌 Contoh Endpoint Penting

| Endpoint         | Tugas                  |
| ---------------- | ---------------------- |
| `addCart.php`    | Tambah item ke cart    |
| `updateCart.php` | Update jumlah / delete |
| `cart_data.php`  | Render HTML cart       |
| `checkout.php`   | Simpan order ke DB     |
| `login.php`      | Login user / admin     |
| `logout.php`     | Logout session         |

---

## 🛠 Tips

### ✨ Keamanan

* Password saat ini disimpan plain text

  ```php
  password_hash() + password_verify()
  ```

### 🧹 Cleanup

* Validasi input user (SQL Injection)

---

## 🧑‍💻 Kontributor

1. Bayu Pranoto (251402066) (Ketua)
2. Jona Vebrian Gultom (251402085) 
3. Indah Ayu Gemilang (251402087) 
4. Muhammad Rajadinata Nasution (251402107) 
5. Quinsha Ilmi Azzahra (251402137) 
6. Ryan Dani Stepanus Girsang (251402140) 


[1]: https://github.com/bayupranoto139-spec/tubes_proweb_kelompok_5.git "GitHub - bayupranoto139-spec/tubes_proweb_kelompok_5"
