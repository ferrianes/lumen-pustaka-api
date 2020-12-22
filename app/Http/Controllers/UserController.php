<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        return User::all();
    }

    public function show($id)
    {
        return User::find($id) ?? response()->json(['message' => 'id tidak ditemukan'], 404);
    }

    public function store(Request $request)
    {
        if ($request->filled('nama')) {
            $data = $request->all();

            try {
                User::create($data);
                return response()->json(['message' => 'User sukses ditambahkan'], 201);
            } catch (\Throwable $e) {
                return response()->json(['message' => 'User gagal ditambahkan'], 400);
            }
        }

        return response()->json(['message' => 'Error: Masukkan nama kategori'], 400);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $buku = User::find($id);

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
        $buku = User::find($id);

        if (!$buku) {
            return response()->json(['message' => 'id tidak ditemukan'], 404);
        }

        $buku->delete();
        return response()->json(['message' => 'user sukses dihapus'], 200);
    }
}
