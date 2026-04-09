Proyek ini adalah sistem manajemen sepatu sederhana untuk Cibaduyut Shoes dengan halaman login, dashboard produk, 
dan fitur interaktif di browser. login.php menampilkan form login dan memeriksa session; 
jika pengguna sudah login ia diarahkan ke index.php, dan jika login gagal atau input kosong akan diberikan pesan error. 
proses_login.php menerima data POST, memvalidasi username dan password terhadap kredensial hardcoded
(admin/admin123 dan manager/manager123), lalu membuat session dan menyimpan cookie username bila opsi “Ingat saya” dicentang. 
logout.php menghapus session dan mengarahkan kembali ke halaman login.
