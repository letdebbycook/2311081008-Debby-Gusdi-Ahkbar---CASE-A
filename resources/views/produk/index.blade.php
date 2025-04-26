@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Produk Toko Online GoodCity</h1>

    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
        <a href="{{ route('produk.deleted') }}" class="btn btn-secondary">Lihat Produk Dihapus</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produks as $produk)
                <tr>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->kategori }}</td>
                    <td>Rp{{ number_format($produk->harga, 2, ',', '.') }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>{{ $produk->tanggal_masuk }}</td>
                    <td>
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada produk tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
        {{ $produks->links() }}
    </div>
</div>
@endsection
