// =====================================================
// Cibaduyut Shoes - script.js
// Fitur: Dark Mode (localStorage), Wishlist (sessionStorage),
//        Beli / Kurangi Stok
// =====================================================


// -----------------------------------------------
// 1. DARK MODE (localStorage)
// -----------------------------------------------

const btnTheme = document.getElementById('btn-theme');
const body = document.body;

// Cek apakah ada tema tersimpan di browser
if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark-mode');
    btnTheme.textContent = 'Mode Terang';
}

btnTheme.addEventListener('click', function () {
    body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
        btnTheme.textContent = 'Mode Terang';
    } else {
        localStorage.removeItem('theme');
        btnTheme.textContent = 'Mode Gelap';
    }
});


// -----------------------------------------------
// 2. FITUR BELI - Kurangi Stok (Event & DOM)
// -----------------------------------------------
// FIX: Sebelumnya iterasi menggunakan variabel lama (tombolBeli) bukan tombolBaru

const tombolBeli = document.querySelectorAll('.btn-detail');

tombolBeli.forEach(function (button) {
    button.addEventListener('click', function (e) {
        const cardBody    = e.target.closest('.card-body');
        const stokElement = cardBody.querySelector('.stok-text');
        let stok          = parseInt(stokElement.innerText.replace('Stok: ', ''));

        if (stok > 0) {
            stok--;
            stokElement.innerText = 'Stok: ' + stok;
            const namaBarang = cardBody.querySelector('.card-title').innerText;
            alert('✅ Berhasil membeli: ' + namaBarang);

            if (stok === 0) {
                e.target.disabled  = true;
                e.target.innerText = 'Habis';
            }
        } else {
            alert('❌ Stok habis!');
            e.target.disabled  = true;
            e.target.innerText = 'Habis';
        }
    });
});


// -----------------------------------------------
// 3. WISHLIST (sessionStorage + Modal + Badge)
// -----------------------------------------------
// FIX: Diimplementasi lengkap mengikuti referensi

const wishlistCountEl     = document.getElementById('wishlist-count');
const wishlistItemsEl     = document.getElementById('wishlistItems');
const btnKosongkan        = document.getElementById('btnKosongkanWishlist');

// Ambil wishlist dari sessionStorage
function getWishlist() {
    const data = sessionStorage.getItem('wishlist');
    return data ? JSON.parse(data) : [];
}

// Simpan wishlist ke sessionStorage
function saveWishlist(arr) {
    sessionStorage.setItem('wishlist', JSON.stringify(arr));
}

// Perbarui angka badge di navbar
function updateBadge() {
    wishlistCountEl.textContent = getWishlist().length;
}

// Render ulang daftar item di dalam modal
function renderModalWishlist() {
    const wishlist = getWishlist();
    wishlistItemsEl.innerHTML = '';

    if (wishlist.length === 0) {
        const liKosong       = document.createElement('li');
        liKosong.className   = 'list-group-item text-muted';
        liKosong.textContent = 'Wishlist kamu masih kosong.';
        wishlistItemsEl.appendChild(liKosong);
        return;
    }

    wishlist.forEach(function (namaItem, index) {
        const li         = document.createElement('li');
        li.className     = 'list-group-item d-flex justify-content-between align-items-center';

        const spanNama       = document.createElement('span');
        spanNama.textContent = namaItem;

        const btnHapus       = document.createElement('button');
        btnHapus.className   = 'btn btn-sm btn-outline-danger';
        btnHapus.textContent = 'Hapus';

        // Hapus satu item berdasarkan index
        btnHapus.addEventListener('click', function () {
            hapusItemWishlist(index);
        });

        li.appendChild(spanNama);
        li.appendChild(btnHapus);
        wishlistItemsEl.appendChild(li);
    });
}

// Hapus satu item dari wishlist
function hapusItemWishlist(index) {
    const wishlist = getWishlist();
    wishlist.splice(index, 1);
    saveWishlist(wishlist);
    renderModalWishlist();
    updateBadge();
}

// Event tombol ❤️ Wishlist di setiap card
const tombolWishlist = document.querySelectorAll('.btn-wishlist');

tombolWishlist.forEach(function (tombol) {
    tombol.addEventListener('click', function () {
        const namaItem = tombol.dataset.nama;   // Ambil dari data-nama="..."
        const wishlist = getWishlist();

        if (wishlist.includes(namaItem)) {
            alert(`"${namaItem}" sudah ada di wishlist kamu.`);
            return;
        }

        wishlist.push(namaItem);
        saveWishlist(wishlist);
        updateBadge();
        alert(`❤️ "${namaItem}" berhasil ditambahkan ke wishlist!`);
    });
});

// Event tombol Kosongkan semua wishlist
btnKosongkan.addEventListener('click', function () {
    sessionStorage.removeItem('wishlist');
    renderModalWishlist();
    updateBadge();
});

// Render ulang modal setiap kali dibuka
const modalWishlistEl = document.getElementById('wishlistModal');
modalWishlistEl.addEventListener('show.bs.modal', function () {
    renderModalWishlist();
});

// Inisialisasi badge saat halaman pertama dimuat
updateBadge();