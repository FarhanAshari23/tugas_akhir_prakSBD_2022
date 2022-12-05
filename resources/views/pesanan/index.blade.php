@extends('pembeli.layout')

@section('content')

<h4 class="mt-5">Data Pesanan</h4>

<a href="{{ route('pesanan.create') }}" type="button" class="btn btn-success rounded-3">Tambah Pesanan</a>



@if($message = Session::get('suksesMemesan'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Pesanan</th>
        <th>ID Pelanggan</th>
        <th>ID Produk</th>
        <th>ID Pembayaran</th>
        <th>Tanggal</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($dataPesanan as $data)
            <tr>
                <td>{{ $data->id_order }}</td>
                <td>{{ $data->id_pembeli }}</td>
                <td>{{ $data->id_produk }}</td>
                <td>{{ $data->id_pembayaran }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>
                    <a href="{{ route('pesanan.edit', $data->id_order) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_order }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_order }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('pesanan.delete', $data->id_order) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>

<h4 class="mt-5">Riwayat Pesanan</h4>

<div class="row g-3 align-items-center mt-2">
  <div class="col-auto">
  <form action="/pesanan" method="GET">
    <input type="search" id="inputPassword6" name="search" placeholder="Cari nama pelanggan" class="form-control" aria-describedby="passwordHelpInline">
  </form>
  </div>
</div>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tanggal</th>
        <th>Nama Produk</th>
        <th>Jenis Produk</th>
        <th>Harga</th>
        <th>Jenis Pembayaran</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($dataSemuaPesanan as $data)
            <tr>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->nama_produk }}</td>
                <td>{{ $data->jenis_produk }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->jenis_pembayaran }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('pembeli.index') }}" type="button" class="btn btn-success rounded-3">Kembali</a>

@stop