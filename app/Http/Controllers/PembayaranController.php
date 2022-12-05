<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PembayaranController extends Controller
{

    public function createPembayaran() {
        return view('pembayaran.add');
    }

    public function storePembayaran(Request $request) {
        $request->validate([
            'id_pembayaran' => 'required',
            'jenis_pembayaran' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pembayaran(id_pembayaran, jenis_pembayaran) VALUES (:id_pembayaran, :jenis_pembayaran)',
        [
            'id_pembayaran' => $request->id_pembayaran,
            'jenis_pembayaran' => $request->jenis_pembayaran,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('pembeli.index')->with('PembayaranSukses', 'Data Pembayaran berhasil disimpan');
    }
    
    public function deletePembayaran($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pembayaran WHERE id_pembayaran = :id_pembayaran', ['id_pembayaran' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('pembeli.index')->with('PembayaranSukses', 'Data Pembayaran berhasil dihapus');
    }

}