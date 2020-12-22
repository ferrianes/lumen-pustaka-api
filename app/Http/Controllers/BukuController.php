<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
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
        return Buku::all();
    }

    public function show($id)
    {
        return Buku::find($id) ?? response()->json(['message' => 'id tidak ditemukan'], 404);
    }

    public function store(Request $request)
    {
        if ($request->filled('judul_buku')) {
            $data = $request->all();

            try {
                Buku::create($data);
                return response()->json(['message' => 'Buku sukses ditambahkan'], 201);
            } catch (\Throwable $e) {
                return response()->json(['message' => 'Buku gagal ditambahkan'], 400);
            }
        }

        return response()->json(['message' => 'Error: Masukkan nama kategori'], 400);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'id tidak ditemukan'], 404);
        }

        if (!$data) {
            return response()->json(['message' => 'Update gagal diupdate'], 201);
        }

        $buku->update($data);
        return response()->json(['message' => 'buku sukses diupdate'], 200);
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'id tidak ditemukan'], 404);
        }

        $buku->delete();
        return response()->json(['message' => 'Buku sukses dihapus'], 200);
    }
}
