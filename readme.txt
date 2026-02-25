Membuat halaman web Sistem Manajemen Sepatu menggunakan Bootstrap untuk layout dan komponen,
serta CSS custom untuk tampilan tambahan seperti background hero dan efek hover card.

- Head
Bagian ini berisi konfigurasi dasar halaman: set karakter, viewport, judul halaman, link Bootstrap, 
dan file style.css. Fungsinya supaya halaman responsif dan punya styling tambahan dari CSS buatan sendiri.

- Navbar
Menampilkan bar navigasi di bagian atas dengan tema gelap dan nama brand. Menggunakan class Bootstrap 
jadi tampilannya otomatis rapi dan bisa menyesuaikan ukuran layar.

- Hero Section
Bagian banner utama yang menampilkan judul dan deskripsi sistem. Di CSS, class 
.hero mengatur tinggi area dan background gambar supaya tampil penuh dan di tengah.

- Dashboard
Berisi tiga card ringkasan data (total produk, stok, kategori). Menggunakan grid Bootstrap agar sejajar. Class 
.dashboard-card di CSS menambahkan efek animasi membesar saat di-hover.

- Daftar Sepatu
Menampilkan list produk dalam bentuk card berisi gambar, nama, harga, stok, dan tombol. 
Semua pakai komponen card Bootstrap supaya konsisten dan mudah diperbanyak datanya.

- Form Tambah Sepatu
Form input untuk menambah data sepatu (nama, harga, stok, kategori). Menggunakan komponen form Bootstrap. 
Saat ini masih tampilan saja, belum ada proses backend.

- Footer
Bagian penutup halaman di paling bawah. Diberi background gelap dan jarak atas lewat CSS supaya tidak menempel dengan konten.