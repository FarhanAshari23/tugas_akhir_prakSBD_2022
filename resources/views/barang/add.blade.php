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

        <h5 class="card-title fw-bolder mb-3">Tambah Barang</h5>

		<form method="post" action="{{ route('barang.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_produk" class="form-label">ID Barang</label>
                <input type="text" class="form-control" id="id_produk" name="id_produk">
            </div>
			<div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk">
            </div>
            <div class="mb-3">
                <label for="jenis_produk" class="form-label">Jenis Barang</label>
                <input type="text" class="form-control" id="jenis_produk" name="jenis_produk">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop