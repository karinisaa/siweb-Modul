@extends('layout.app')
@section('title', 'Keranjang Belanja')

@section('content')
<div class="page-header">
    <div>
        <h1>🛒 Keranjang Belanja</h1>
        <p>Produk yang siap kamu beli</p>
    </div>
    <a href="{{ route('home') }}" class="btn btn-outline">← Lanjut Belanja</a>
</div>

@if(empty($cart))
    <div class="empty-state">
        <div class="icon">🛍️</div>
        <h3>Keranjang masih kosong</h3>
        <p>Yuk, temukan aksesori cantik untuk kamu!</p>
        <a href="{{ route('home') }}" class="btn btn-pink">Belanja Sekarang ✨</a>
    </div>
@else
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $item['name'] }}</strong></td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>
                            <span class="badge badge-mint">{{ $item['quantity'] }}</span>
                        </td>
                        <td style="font-weight:700; color:#B76E79;">
                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                        </td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST"
                                  onsubmit="return confirm('Hapus dari keranjang?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="cart-total">
        <div>
            <div class="total-label">Total Belanja</div>
            <div class="total-amount">Rp {{ number_format($total, 0, ',', '.') }}</div>
        </div>
        <a href="{{ route('home') }}" class="btn btn-outline">+ Tambah Produk</a>
    </div>
@endif
@endsection