<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PembeliController extends Controller
{
    public function index() {
        $datas = DB::table('pembeli')
        ->paginate()
        ->whereNull('deleted_at');
        $dataBarang = DB::table('produk')
        ->paginate()
        ->whereNull('deleted_at');
        $dataPembayaran = DB::select('select * from pembayaran');

        return view('pembeli.index')
            ->with(['datas'=> $datas])
            ->with(['dataPembayaran'=> $dataPembayaran])
            ->with('dataBarang', $dataBarang);           
    }

    public function create() {
        return view('pembeli.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pembeli(id_pembeli, nama, alamat, password, deleted_at) VALUES (:id_pembeli, :nama, :alamat, :password, :deleted_at)',
        [
            'id_pembeli' => $request->id_pembeli,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
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

        return redirect()->route('pembeli.index')->with('success', 'Data Pembeli berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pembeli')->where('id_pembeli', $id)->first();

        return view('pembeli.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pembeli' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pembeli SET id_pembeli = :id_pembeli, nama = :nama, alamat = :alamat, password = :password WHERE id_pembeli = :id',
        [
            'id' => $id,
            'id_pembeli' => $request->id_pembeli,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
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

        return redirect()->route('pembeli.index')->with('success', 'Data Pembeli berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pembeli WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('pembeli.index')->with('success', 'Data Pembeli berhasil dihapus');
    }

    public function softdelete($id) {
        DB::update('UPDATE pembeli SET deleted_at = 1 WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);
        return redirect()->route('pembeli.index')->with('success', 'Data dihapus sementara');
    }

    public function restore($id){
        DB::update('UPDATE pembeli SET deleted_at = null WHERE id_pembeli = :id_pembeli = 1', ['id_pembeli' => $id]);

        return redirect()->route('barang.bin')->with('success', 'Data direstore');
    }

}