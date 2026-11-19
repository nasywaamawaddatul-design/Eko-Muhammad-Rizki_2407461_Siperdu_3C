<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $kategori = Kategori::withCount('buku')
        ->orderBy('nama_kategori')
        ->get();

    return view('admin.data-kategori', compact('kategori'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $kategori = new Kategori();

    return view('admin.kategori.create', compact('kategori'));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori',
    ], [
        'nama_kategori.required' => 'Nama kategori wajib diisi.',
        'nama_kategori.unique' => 'Kategori tersebut sudah tersedia.',
        'nama_kategori.max' => 'Nama kategori maksimal 100 karakter.',
    ]);

    Kategori::create($data);

    return redirect()->route('admin.kategori.index')
        ->with('success', 'Kategori berhasil ditambahkan.');
}


    /**
     * Show the form for editing the specified resource.
     */
  public function edit(Kategori $kategori)
{
    return view('admin.kategori.edit', compact('kategori'));
}
    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Kategori $kategori)
{
    $data = $request->validate([
        'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori,' . $kategori->id,
    ], [
        'nama_kategori.required' => 'Nama kategori wajib diisi.',
        'nama_kategori.unique' => 'Kategori tersebut sudah tersedia.',
        'nama_kategori.max' => 'Nama kategori maksimal 100 karakter.',
    ]);

    $kategori->update($data);

    return redirect()->route('admin.kategori.index')
        ->with('success', 'Kategori berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Kategori $kategori)
{
    if ($kategori->buku()->exists()) {
        return redirect()->route('admin.kategori.index')
            ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh buku.');
    }

    $kategori->delete();

    return redirect()->route('admin.kategori.index')
        ->with('success', 'Kategori berhasil dihapus.');
}
}
