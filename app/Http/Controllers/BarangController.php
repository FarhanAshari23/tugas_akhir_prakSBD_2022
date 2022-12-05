<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangController extends Controller
{

    public function createBarang() {
        return view('barang.add');
    }

    public function storeBarang(Request $request) {
        $request->validate([
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'jenis_produk' => 'required',
            'stock' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO produk(id_produk, nama_produk, harga, jenis_produk, stock, deleted_at) VALUES (:id_produk, :nama_produk, :harga, :jenis_produk, :stock, :deleted_at)',
        [
            'id_produk' => $request->id_produk,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'jenis_produk' => $request->jenis_produk,
            'stock' => $request->stock,
            'deleted_at' => null,
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

        return redirect()->route('pembeli.index')->with('sukses', 'Data Barang berhasil disimpan');
    }

    public function editBarang($id) {
        $data = DB::table('produk')->where('id_produk', $id)->first();

        return view('barang.edit')->with('data', $data);
    }

    public function updateBarang($id, Request $request) {
        $request->validate([
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'jenis_produk' => 'required',
            'harga' => 'required',
            'stock' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE produk SET id_produk = :id_produk, nama_produk = :nama_produk, jenis_produk = :jenis_produk, harga = :harga, stock = :stock WHERE id_produk = :id',
        [
            'id' => $id,
            'id_produk' => $request->id_produk,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'jenis_produk' => $request->jenis_produk,
            'stock' => $request->stock,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('pembeli.index')->with('sukses', 'Data Barang berhasil diubah');
    }

    public function deleteBarang($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM produk WHERE id_produk = :id_produk', ['id_produk' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('pembeli.index')->with('sukses', 'Data Barang berhasil dihapus');
    }

    public function softdeleteBarang($id) {
        DB::update('UPDATE produk SET deleted_at = 1 WHERE id_produk = :id_produk', ['id_produk' => $id]);
        return redirect()->route('pembeli.index')->with('sukses', 'Data dihapus sementara');
    }

    public function restoreBarang($id){
        DB::update('UPDATE produk SET deleted_at = null WHERE id_produk = :id_produk = 1', ['id_produk' => $id]);

        return redirect()->route('barang.bin')->with('sukses', 'Data direstore');
    }

    public function barangBin(){
        $barangs = DB::select('SELECT * FROM produk where deleted_at = 1');
        $pembelis = DB::select('SELECT * FROM pembeli where deleted_at = 1');


        return view('barang.bin')
        ->with('barangs', $barangs)
        ->with('pembelis', $pembelis);

    }

}