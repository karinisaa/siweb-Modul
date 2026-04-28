<div class="modal fade" id="editProdukModal{{ $item->product_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Produk: {{ $item->product_name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('products.update', $item->product_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="product_name" value="{{ $item->product_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-control" name="category_id" required>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->category_id }}" {{ $item->category_id == $cat->category_id ? 'selected' : '' }}>
                                    {{ $cat->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" name="product_price" value="{{ $item->product_price }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok Produk</label>
                        <input type="number" class="form-control" name="product_stock" value="{{ $item->product_stock }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ganti Gambar Produk (Opsional)</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $item->product_image) }}" alt="Current Image" class="img-thumbnail" style="width: 100px;">
                        </div>
                        <input type="file" class="form-control" name="product_image">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning"><i class="bi bi-save me-1"></i> Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
