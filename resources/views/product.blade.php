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
                        @if ($item->product_image)
                            <img src="{{ asset('storage/' . $item->product_image) }}" class="card-img-top"
                                alt="{{ $item->product_name }}" style="height: 200px; object-fit: cover;" />
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center"
                                style="height: 200px;">
                                <span class="text-muted">Tidak ada gambar</span>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->product_name }}</h5>
                            <p class="card-text harga-text text-danger mb-1">
                                Harga: Rp {{ number_format($item->product_price, 0, ',', '.') }}
                            </p>
                            <p class="card-text stok-text mb-3">Stok: {{ $item->product_stock }}</p>

                            <div class="mt-auto d-flex gap-2">
                                <button class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                                    data-bs-target="#editProdukModal{{ $item->product_id }}">Update</button>

                                <form action="{{ route('products.destroy', $item->product_id) }}" method="POST" class="w-100"
                                    onsubmit="return confirm('Yakin ingin menghapus produk {{ $item->product_name }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editProdukModal{{ $item->product_id }}" tabindex="-1"
                    aria-labelledby="editProdukModalLabel{{ $item->product_id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editProdukModalLabel{{ $item->product_id }}">Edit Produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            @include('modal.updateProduct')
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahProdukModalLabel">Tambah Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @include('modal.createProduct')
            </div>
        </div>
    </div>
@endsection

