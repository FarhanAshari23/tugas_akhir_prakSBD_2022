<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\SemuaPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PesananController extends Controller
{
    public function indexPesanan(Request $request) {
        $dataPesanan = DB::table('pesanan')->paginate();

        if($request->has('search')){
            $search = $request->search;

            $dataSemuaPesanan = DB::table('semuapesanan')
            ->where('nama','LIKE','%' .$search.'%')
            ->paginate();
        }else{
            $dataSemuaPesanan = DB::table('semuapesanan')
            ->paginate();
        }

        return view('pesanan.index')
            ->with(['dataSemuaPesanan' => $dataSemuaPesanan])
            ->with(['dataPesanan'=> $dataPesanan]);           
    }

    public function createPesanan() {
        return view('pesanan.add');
    }

    public function storePesanan(Request $request) {
        $request->validate([
            'id_order' => 'required',
            'id_produk' => 'required',
            'id_pembeli' => 'required',
            'id_pembayaran' => 'required',
            'tanggal' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pesanan(id_order, id_produk, id_pembeli, id_pembayaran, tanggal) VALUES (:id_order, :id_produk, :id_pembeli, :id_pembayaran, :tanggal)',
        [
            'id_order' => $request->id_order,
            'id_produk' => $request->id_produk,
            'id_pembeli' => $request->id_pembeli,
            'id_pembayaran' => $request->id_pembayaran,
            'tanggal' => $request->tanggal,
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

        return redirect()->route('pesanan.index')->with('suksesMemesan', 'Data Pesanan berhasil disimpan');
    }

    public function editPesanan($id) {
        $data = DB::table('pesanan')->where('id_order', $id)->first();

        return view('pesanan.edit')->with('data', $data);
    }

    public function updatePesanan($id, Request $request) {
        $request->validate([
            'id_order' => 'required',
            'id_produk' => 'required',
            'id_pembeli' => 'required',
            'id_pembayaran' => 'required',
            'tanggal' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pesanan SET id_order = :id_order, id_produk = :id_produk, id_pembeli = :id_pembeli, id_pembayaran = :id_pembayaran, tanggal = :tanggal WHERE id_order = :id',
        [
            'id' => $id,
            'id_order' => $request->id_order,
            'id_produk' => $request->id_produk,
            'id_pembeli' => $request->id_pembeli,
            'id_pembayaran' => $request->id_pembayaran,
            'tanggal' => $request->tanggal,
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

        return redirect()->route('pesanan.index')->with('suksesMemesan', 'Data Pesanan berhasil diubah');
    }

    public function deletePesanan($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pesanan WHERE id_order = :id_order', ['id_order' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('pesanan.index')->with('suksesMemesan', 'Data Pesanan berhasil dihapus');
    }

}