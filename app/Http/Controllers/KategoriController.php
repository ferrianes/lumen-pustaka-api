<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KategoriController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return Kategori::all();
    }

    public function show($id)
    {
        return Kategori::find($id) ?? response()->json(['message' => 'id tidak ditemukan'], 404);
    }

    public function store(Request $request)
    {
        if ($request->filled('nama_kategori')) {
            $data = $request->only('nama_kategori');
            
            try {
                Kategori::create($data);
                return response()->json(['message' => 'Kategori sukses ditambahkan'], 201);
            } catch (\Throwable $e) {
                return response()->json(['message' => 'Kategori gagal ditambahkan'], 400);
            }
        }

        return response()->json(['message' => 'Error: Masukkan nama kategori'], 400);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('nama_kategori');

        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json(['message' => 'id tidak ditemukan'], 404);
        }

        if (!$data) {
            return response()->json(['message' => 'Kategori gagal diupdate'], 201);
        }

        $kategori->update($data);
        return response()->json(['message' => 'Kategori sukses diupdate'], 200);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json(['message' => 'id tidak ditemukan'], 404);
        }

        $kategori->delete();
        return response()->json(['message' => 'Kategori sukses dihapus'], 200);
    }
}
