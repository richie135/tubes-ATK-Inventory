<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller {
    // API untuk Monitoring di Mobile (Bab 4.2)
    public function index() {
        $barangs = Barang::all()->map(function($item) {
            // Logika Rule-Based (Bab 3.5)
            if ($item->stok == 0) {
                $item->status = 'Habis';
            } elseif ($item->stok < $item->batas_minimum) {
                $item->status = 'Menipis';
            } else {
                $item->status = 'Aman';
            }
            return $item;
        });
        return response()->json($barangs);
    }

    // Simpan Barang Baru (Bab 3.3)
    public function store(Request $request) {
        $barang = Barang::create($request->all());
        return response()->json(['message' => 'Barang berhasil disimpan', 'data' => $barang]);
    }
}