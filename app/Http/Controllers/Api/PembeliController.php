<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pembeli;

class PembeliController extends Controller
{
    public function index()
    {
        $pembeli = Pembeli::with('koneksi')->get();
        
        return response()->json([
            'type' => 'success',
            'date' => $pembeli
        ], 200);
    }

    public function show($id)
    {
        $pembeli = Pembeli::find($id)->load('koneksi'); 

        return response()->json([
            'type' => 'success',
            'data' => $pembeli
        ], 200);
    }

    public function store(Request $request)
    {
        $pembeli = new Pembeli;
        $pembeli->nama = $request->nama;
        $pembeli->alamat = $request->alamat;
        $pembeli->byk_obat = $request->byk_obat;
        $pembeli->karyawan_id = $request->karyawan_id;
        $pembeli->koneksi()->attach($request->koneksi);
        $pembeli->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data saved successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $pembeli = Pembeli::find($id);
        $pembeli->nama = $request->nama;
        $pembeli->alamat = $request->alamat;
        $pembeli->byk_obat = $request->byk_obat;
        $pembeli->karyawan_id = $request->karyawan_id;
        $pembeli->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data updated successfully'
        ], 201);
    }

    public function destroy($id)
    {
        $pembeli = Pembeli::find($id);
        $pembeli->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Data deleted successfully'
        ], 200);
    }    
}
