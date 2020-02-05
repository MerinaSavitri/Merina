<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Stok;

class StokController extends Controller
{
    public function index()
    {
        $stok = Stok::with(['obat'])->get();

        return response()->json([
            'type' => 'success',
            'date' => $stok
        ], 200);
    }

    public function show($id)
    {
        $stok = Stok::find($id)->load(['obat']); 

        return response()->json([
            'type' => 'success',
            'data' => $stok
        ], 200);
    }

    public function store(Request $request)
    {
        $stok = new Stok;
        $stok->nama = $request->nama;
        $stok->harga = $request->harga;
        $stok->obat_id = $request->obat_id;
        $stok->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data saved successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $stok = Stok::find($id);
        $stok->nama = $request->nama;
        $stok->harga = $request->harga;
        $stok->obat_id = $request->obat_id;
        $stok->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data updated successfully'
        ], 201);
    }

    public function destroy($id)
    {
        $stok = Stok::find($id);
        $stok->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Data deleted successfully'
        ], 200);
    }    
}
