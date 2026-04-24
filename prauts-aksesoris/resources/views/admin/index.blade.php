@extends('layout.app')
@section('title', 'Kelola Produk')

@section('content')
<div class="page-header">
    <div>
        <h1>🗂️ Kelola Produk</h1>
        <p>Tambah, edit, atau hapus produk toko</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-pink">+ Tambah Produk</a>
</div>

@if($products->isEmpty())
    <div class="empty-state">
        <div class="icon">📦</div>
        <h3>Belum ada produk</h3>
        <p>Mulai tambahkan produk sekarang!</p>
        <a href="{{ route('admin.products.create') }}" class="btn btn-pink">Tambah Produk</a>
    </div>
@else
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $i => $product)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td><strong>{{ $product->name }}</strong></td>
                    <td style="color:#B76E79; font-weight:700;">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <div class="badge-wrap">
                            @foreach($product->categories as $cat)
                                <span class="badge">{{ $cat->name }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td>
                        <div class="action-group">
                            <a href="{{ route('admin.products.edit', $product) }}"
                               class="btn btn-navy btn-sm">✏️ Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}"
                                  method="POST" style="display:inline;"
                                  onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection