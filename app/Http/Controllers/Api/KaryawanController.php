<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with(['pembeli'])->get();

        return response()->json([
            'type' => 'success',
            'date' => $karyawan
        ], 200);
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id)->load(['pembeli']); 

        return response()->json([
            'type' => 'success',
            'data' => $karyawan
        ], 200);
    }

    public function store(Request $request)
    {
        $karyawan = new Karyawan;
        $karyawan->nama = $request->nama;
        $karyawan->bagian = $request->bagian;
        $karyawan->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data saved successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->nama = $request->nama;
        $karyawan->bagian = $request->bagian;
        $karyawan->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Data updated successfully'
        ], 201);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Data deleted successfully'
        ], 200);
    }    
}
