@extends('pembeli.layout')

@section('content')

<h4 class="mt-5">Tempat Sampah</h4>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<h4 class="mt-5">Pembeli</h4>
<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Pelanggan</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pembelis as $pembeli)
            <tr>
                <td>{{ $pembeli->id_pembeli }}</td>
                <td>{{ $pembeli->nama }}</td>
                <td>{{ $pembeli->alamat }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#restoreModal{{ $pembeli->id_pembeli }}">
                        Restore
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="restoreModal{{ $pembeli->id_pembeli }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="GET" action="{{ route('pembeli.restore', $pembeli->id_pembeli) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda ingin mengembalikan data ini?
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

<h4 class="mt-5">Barang</h4>
<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Harga</th>
        <th>Stock</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($barangs as $barang)
            <tr>
                <td>{{ $barang->id_produk }}</td>
                <td>{{ $barang->nama_produk }}</td>
                <td>{{ $barang->jenis_produk }}</td>
                <td>{{ $barang->harga }}</td>
                <td>{{ $barang->stock }}</td>
                <td>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $barang->id_produk }}">
                        Restore
                    </button>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapusModal{{ $barang->id_produk }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="GET" action="{{ route('barang.restore', $barang->id_produk) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda ingin mengembalikan data ini?
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

<a href="{{ route('pembeli.index') }}" type="button" class="btn btn-success rounded-3">Kembali</a>

@stop