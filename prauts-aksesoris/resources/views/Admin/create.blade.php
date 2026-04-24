@extends('layout.app')
@section('title', 'Tambah Produk')

@section('content')
<div class="page-header">
    <div>
        <h1>Tambah Produk</h1>
        <p>Isi detail produk baru</p>
    </div>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline">← Kembali</a>
</div>

<div class="form-card">
    @if($errors->any())
        <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   placeholder="Contoh: Gelang Bunga Rose Gold" required>
            @error('name')<p class="error-text">{{ $message }}</p>@enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" placeholder="Deskripsi singkat produk...">{{ old('description') }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price') }}"
                       placeholder="50000" min="0" required>
                @error('price')<p class="error-text">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stock" value="{{ old('stock', 0) }}"
                       placeholder="10" min="0" required>
                @error('stock')<p class="error-text">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="form-group">
            <label>Kategori <span style="font-weight:400; color:#888;">(bisa pilih lebih dari satu)</span></label>
            <div class="checkbox-group">
                @foreach($categories as $cat)
                    <label class="checkbox-item">
                        <input type="checkbox" name="categories[]" value="{{ $cat->id }}"
                               {{ in_array($cat->id, old('categories', [])) ? 'checked' : '' }}>
                        {{ $cat->name }}
                    </label>
                @endforeach
                @if($categories->isEmpty())
                    <p style="font-size:0.82rem; color:#888;">Belum ada kategori tersedia.</p>
                @endif
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-pink">💾 Simpan Produk</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection