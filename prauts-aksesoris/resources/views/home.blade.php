@extends('layout.app')
@section('title', 'Koleksi Aksesoris')

@section('content')
<div class="hero">
    <h1>✨ Koleksi Aksesoris Terbaru</h1>
    <p>Temukan aksesori cantik pilihan hati kamu 🌸</p>
</div>

@if($products->isEmpty())
    <div class="empty-state">
        <div class="icon">🛍️</div>
        <h3>Belum ada produk tersedia</h3>
        <p>Sabar ya, koleksi baru segera hadir!</p>
    </div>
@else
    <div class="product-grid">
        @php $emojis = ['💍','📿','💎','👑','🌸','✨','🎀','🌺']; @endphp
        @foreach($products as $i => $product)
        <div class="product-card">
            <div class="card-img">{{ $emojis[$i % count($emojis)] }}</div>
            <div class="card-body">
                <div class="card-title">{{ $product->name }}</div>
                @if($product->description)
                    <div class="card-desc">{{ Str::limit($product->description, 70) }}</div>
                @endif
                <div class="card-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                <div class="badge-wrap">
                    @foreach($product->categories as $cat)
                        <span class="badge">{{ $cat->name }}</span>
                    @endforeach
                </div>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-pink" style="width:100%;">
                        🛒 Tambah ke Keranjang
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection