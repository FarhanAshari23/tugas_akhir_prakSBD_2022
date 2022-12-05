@extends('pembeli.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Barang</h5>

		<form method="post" action="{{ route('barang.update', $data->id_produk) }}">
			@csrf
            <div class="mb-3">
                <label for="id_produk" class="form-label">ID Barang</label>
                <input type="text" class="form-control" id="id_produk" name="id_produk" value="{{ $data->id_produk }}">
            </div>
			<div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $data->nama_produk }}">
            </div>
            <div class="mb-3">
                <label for="jenis_produk" class="form-label">Jenis Barang</label>
                <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" value="{{ $data->jenis_produk }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{ $data->stock }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>



@stop