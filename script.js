// ================================
// 1. FITUR DARK MODE
// ================================

const btnTheme = document.getElementById("btn-theme");
const body = document.body;

if (localStorage.getItem("theme") === "dark") {
  body.classList.add("dark-mode");
  btnTheme.textContent = "Mode Terang";
}

btnTheme.addEventListener("click", function() {
  body.classList.toggle("dark-mode");

  if (body.classList.contains("dark-mode")) {
    localStorage.setItem("theme", "dark");
    btnTheme.textContent = "Mode Terang";
  } else {
    localStorage.setItem("theme", "light");
    btnTheme.textContent = "Mode Gelap";
  }
});

// ================================
// 2. FITUR BELI DAN KURANGI STOK
// ================================

 function aktifkanTombolBeli() {
    const tombolBeli = document.querySelectorAll(".btn-primary");
    tombolBeli.forEach(function(tombol) {
    if (tombol.textContent.trim() === 'Beli') {
        tombol.addEventListener('click', function(e) {
            const cardBody = e.target.closest('.card-body');
            const stokElement = cardBody.querySelector('p:nth-child(3)');
              let stok = parseInt(stokElement.textContent.replace('Stok: ', ''));
                if (stok > 0) {
                  stok--;
                  stokElement.textContent = 'Stok: ' + stok;
                  const namaBarang = cardBody.querySelector('.card-title').textContent;
                  alert('Berhasil membeli ' + namaBarang);
                } else {
                  alert('Maaf, stok barang habis!');
                  e.target.disabled = true;
                  e.target.textContent = 'Habis';
                }
            });
        }
    });
}

aktifkanTombolBeli();

// ================================
// 3. FITUR WISHLIST
// ================================

function updateWishlistCount() {
    const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
    document.getElementById('wishlist-count').textContent = wishlist.length;
}

function aktifkanTombolWishlist() {
    const tombolWishlist = document.querySelectorAll('.btn-wishlist');

    tombolWishlist.forEach(function (button) {
        button.replaceWith(button.cloneNode(true));
    });

    const newButtons = document.querySelectorAll('.btn-wishlist');

    newButtons.forEach(function (button) {
        button.addEventListener('click', function (e) {
            const cardBody = e.target.closest('.card-body');
            const namaBarang = cardBody.querySelector('.card-title').innerText;
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            if (!wishlist.includes(namaBarang)) {
                wishlist.push(namaBarang);
                localStorage.setItem('wishlist', JSON.stringify(wishlist));
                alert(namaBarang + ' berhasil ditambahkan ke wishlist!');
                updateWishlistCount();
            } else {
                alert(namaBarang + ' sudah ada di wishlist!');
            }
        });
    });
}

function tampilkanWishlist() {
    const daftarWishlist = document.getElementById('daftar-wishlist');
    let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

    daftarWishlist.innerHTML = '';

    if (wishlist.length === 0) {
        const li = document.createElement('li');
        li.className = 'list-group-item text-center text-muted';
        li.textContent = 'Wishlist kosong';
        daftarWishlist.appendChild(li);
    } else {
        wishlist.forEach(function (item) {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.textContent = item;

            daftarWishlist.appendChild(li);
        });
    }
}

function hapusWishlist() {
    localStorage.removeItem('wishlist');
    updateWishlistCount();
    tampilkanWishlist();
}

    aktifkanTombolWishlist();
    updateWishlistCount();