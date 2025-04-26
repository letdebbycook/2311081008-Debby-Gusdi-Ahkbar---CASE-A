<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\ProdukRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::paginate(10);
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdukRequest $request)
    {
        Produk::create($request->validated());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdukRequest $request, Produk $produk)
    {
        $produk->update($request->validated());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }

    public function deleted()
    
    {
        $produk = Produk::onlyTrashed()->get();
        return view('produk.deleted', compact('produks'));
    }

    public function restore($id)
    {
        $produk = Produk::withTrashed()->findOrFail($id);
        $produk->restore();
        return redirect()->route('produk.deleted')->with('success', 'Produk berhasil dipulihkan');
    }

    public function forceDelete($id)
    {
        $produk = Produk::onlyTrashed()->findOrFail($id);
        $produk->forceDelete();

        return redirect()->route('produk.deleted')->with('success', 'Produk berhasil dihapus permanen.');
    }

    public function restoreAll()
    {
        Produk::onlyTrashed()->restore();
        return redirect()->route('produk.deleted')->with('success', 'Semua produk berhasil dipulihkan.');
    }

    public function forceDeleteAll()
    {
        Produk::onlyTrashed()->forceDelete();
        return redirect()->route('produk.deleted')->with('success', 'Semua produk berhasil dihapus permanen.');
    }

}
