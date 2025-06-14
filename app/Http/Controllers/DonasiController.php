<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        return view('donasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'jumlah_donasi' => 'required|integer|min:1000',
        ]);

        \DB::table('donasis')->insert([
            'nama' => $request->nama,
            'jumlah_donasi' => $request->jumlah_donasi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas donasinya!');
    }
}
