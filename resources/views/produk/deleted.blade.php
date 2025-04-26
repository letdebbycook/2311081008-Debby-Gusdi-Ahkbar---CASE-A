@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Produk yang Dihapus</h1>

    @if ($produks->count())
        <div class="mb-3">
            <form action="{{ route('produk.restoreAll') }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <button class="btn btn-primary btn-sm" onclick="return confirm('Yakin mau pulihkan semua produk?')">
                    Pulihkan Semua
                </button>
            </form>

            <form action="{{ route('produk.forceDeleteAll') }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus permanen semua produk?')">
                    Hapus Permanen Semua
                </button>
            </form>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>{{ $produk->kategori }}</td>
                        <td>{{ $produk->harga }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td>
                            <form action="{{ route('produk.restore', $produk->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success btn-sm">Pulihkan</button>
                            </form>

                            <form action="{{ route('produk.forceDelete', $produk->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus permanen?')">Hapus Permanen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info text-center">Tidak ada produk yang dihapus.</div>
    @endif
</div>
@endsection
