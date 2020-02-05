<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::with(['koneksi'])->get();

        return response()->json([
            'type' => 'success',
            'date' => $obat
        ], 200);
    }

    public function show($id)
    {
        $obat = Obat::find($id)->load(['koneksi']); 

        return response()->json([
            'type' => 'success',
            'data' => $obat
        ], 200);
    }

    public function store(Request $request)
    {
        $obat = new Obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->kode_obat = $request->kode_obat;
        $obat->jenis = $request->jenis;
        $obat->koneksi()->attach($request->koneksi);
        $obat->save();
      

        return response()->json([
            'type' => 'success',
            'message' => 'Data saved successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::find($id);
        $obat->nama_obat = $request->nama_obat;
        $obat->kode_obat = $request->kode_obat;
        $obat->jenis = $request->jenis;
        $obat->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data updated successfully'
        ], 201);
    }

    public function destroy($id)
    {
        $obat = Obat::find($id);
        $obat->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Data deleted successfully'
        ], 200);
    }    
}
