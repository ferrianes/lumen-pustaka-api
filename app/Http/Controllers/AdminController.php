<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
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
        return Admin::all();
    }

    public function show($id)
    {
        return Admin::find($id) ?? response()->json(['message' => 'id tidak ditemukan'], 404);
    }

    public function store(Request $request)
    {
        if ($request->filled('nama') && $request->filled('password')) {
            $data = $request->only(['nama', 'password']);

            try {
                Admin::create($data);
                return response()->json(['message' => 'Admin sukses ditambahkan'], 201);
            } catch (\Throwable $e) {
                return response()->json(['message' => 'Admin gagal ditambahkan'], 400);
            }
        }

        return response()->json(['message' => 'Error: Masukkan nama kategori'], 400);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['nama', 'password']);

        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['message' => 'id tidak ditemukan'], 404);
        }

        if (!$data) {
            return response()->json(['message' => 'admin gagal diupdate'], 400);
        }

        $admin->update($data);
        return response()->json(['message' => 'admin sukses diupdate'], 200);
    }

    public function destroy($id)
    {
        $kategori = Admin::find($id);

        if (!$kategori) {
            return response()->json(['message' => 'id tidak ditemukan'], 404);
        }

        $kategori->delete();
        return response()->json(['message' => 'admin sukses dihapus'], 200);
    }
}
