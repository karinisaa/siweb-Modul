<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AksesorisShop')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav class="navbar">
    <a href="{{ auth()->check() && auth()->user()->isAdmin() ? route('admin.products.index') : route('home') }}"
       class="brand">🌸 AksesorisShop</a>

    <div class="nav-links">
        @auth
            @if(!auth()->user()->isAdmin())
                <a href="{{ route('home') }}">🏠 Produk</a>
                <a href="{{ route('cart.index') }}">
                    🛒 Keranjang
                    @php $cartCount = count(session()->get('cart', [])); @endphp
                    @if($cartCount > 0)
                        <span class="badge" style="font-size:0.65rem; padding:2px 7px; margin-left:3px;">{{ $cartCount }}</span>
                    @endif
                </a>
            @else
                <a href="{{ route('admin.products.index') }}">📦 Kelola Produk</a>
                <a href="{{ route('admin.products.create') }}">➕ Tambah</a>
            @endif

            <span class="user-info">Hi, {{ auth()->user()->name }}</span>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        @endauth
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">✅ {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">❌ {{ session('error') }}</div>
    @endif

    @yield('content')
</div>

<footer style="text-align:center; padding:24px; font-size:0.8rem; color:#B76E79; border-top:1px solid #E0E0E0; margin-top:40px;">
    🌸 AksesorisShop &copy; {{ date('Y') }} — Semua aksesori cantik ada di sini
</footer>

</body>
</html>