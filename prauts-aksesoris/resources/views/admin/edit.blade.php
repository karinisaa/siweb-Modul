@extends('layout.app')
@section('title', 'Edit Produk')

@section('content')
<div class="page-header">
    <div>
        <h1>✏️ Edit Produk</h1>
        <p>Perbarui informasi produk</p>
    </div>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline">← Kembali</a>
</div>

<div class="form-card">
    @if($errors->any())
        <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')<p class="error-text">{{ $message }}</p>@enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0" required>
                @error('price')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" min="0" required>
                @error('stock')<p class="error-text">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <div class="checkbox-group">
                @foreach($categories as $cat)
                    <label class="checkbox-item">
                        <input type="checkbox" name="categories[]" value="{{ $cat->id }}"
                               {{ in_array($cat->id, old('categories', $selectedCats)) ? 'checked' : '' }}>
                        {{ $cat->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-pink">💾 Perbarui Produk</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection