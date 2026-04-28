{{-- code untuk file layouts/main.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Sepatu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>

    @include('partials.navbar')

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-trash-fill me-2"></i> {{ session('deleted') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </div>
    <footer class="bg-dark text-white text-center p-3">
        © 2026 Sistem Manajemen Sepatu
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
{{-- batas code layouts/main.blade.php --}}

{{-- code untuk file partials/navbar.blade.php --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Toko Sepatu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('products') }}">Produk</a>
                </li>
                </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal"
                    data-bs-target="#wishlistModal" onclick="tampilkanWishlist()">
                    ⭐ Wishlist (<span id="wishlist-count">0</span>)
                </button>

                <button id="btn-theme" class="btn btn-outline-light btn-sm me-2">
                    Mode Gelap
                </button>

                @if (session()->has('user'))
                    <span class="text-white me-3">
                        {{ session('user') }}
                    </span>

                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">
                        Logout
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-warning btn-sm">
                        Login
                    </a>
                @endif

            </div>
    </div>
</nav>
{{-- batas code partials/navbar.blade.php --}}

{{-- code untuk file modal/wishlist.blade.php --}}
<div class="modal fade" id="wishlistModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Wishlist Saya</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" id="daftar-wishlist">
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-danger" onclick="hapusWishlist()">Kosongkan</button>
                </div>
            </div>
        </div>
</div>
{{-- batas code modal/wishlist.blade.php --}}

{{-- code untuk file index.blade.php --}}
@extends('layouts.main')
@include('modal.wishlist')

@section('content')
<div class="hero text-center text-white d-flex align-items-center">
        <div class="container">
            <h1>Sistem Manajemen Sepatu</h1>
            <p>Kelola Data Sepatu Dengan Mudah</p>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h5>Total Produk</h5>
                        <h2 id="total-produk">3</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h5>Stok Tersedia</h5>
                        <h2 id="total-stok">27</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h5>Kategori</h5>
                        <h2>3</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3 align-items-center">
            <h3 class="mb-4">Daftar Sepatu</h3>
            <a href="{{ route('products')}}" class="btn btn-primary me-2">Lihat Semua Produk</a>
        </div>
        <div class="row" id="container-barang">

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('assets/NIKE_P_6000.jpg') }}" class="card-img-top" alt="Sepatu" />
                    <div class="card-body">
                        <h5 class="card-title">Nike P-6000</h5>
                        <p class="card-text harga-text">Harga: Rp 1429000</p>
                        <p class="card-text stok-text">Stok: 10</p>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                            <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('assets/AIR_FORCE_1.jpg') }}" class="card-img-top" alt="Sepatu" />
                    <div class="card-body">
                        <h5 class="card-title">Nike Air Force 1</h5>
                        <p class="card-text harga-text">Harga: Rp 1529000</p>
                        <p class="card-text stok-text">Stok: 7</p>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                            <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('assets/AIR_JORDAN_1_LOW.jpg') }}" class="card-img-top" alt="Sepatu" />
                    <div class="card-body">
                        <h5 class="card-title">Nike Air Jordan 1 Low</h5>
                        <p class="card-text harga-text">Harga: Rp 1729000</p>
                        <p class="card-text stok-text">Stok: 10</p>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                            <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
{{-- batas code index.blade.php --}}

{{-- code untuk file product.blade.php --}}
@extends('layouts.main')
@include('modal.wishlist')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3 align-items-center">
            <h3 class="mb-4">Daftar Sepatu</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
                Tambah Produk
            </button>
        </div>
        <div class="row" id="container-barang">
            @foreach ($products as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->product_name }}</h5>

                            <p class="card-text harga-text text-danger mb-1">
                                Harga: Rp {{ number_format($item->product_price, 0, ',', '.') }}
                            </p>

                            <p class="card-text stok-text mb-3">Stok: {{ $item->product_stock }}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
{{-- batas code product.blade.php --}}

