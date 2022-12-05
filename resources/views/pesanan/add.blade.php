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

        <h5 class="card-title fw-bolder mb-3">Tambah Pesanan</h5>

		<form method="post" action="{{ route('pesanan.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_order" class="form-label">ID Pesanan</label>
                <input type="text" class="form-control" id="id_order" name="id_order">
            </div>
			<div class="mb-3">
                <label for="id_produk" class="form-label">ID Produk</label>
                <input type="text" class="form-control" id="id_produk" name="id_produk">
            </div>
            <div class="mb-3">
                <label for="id_pembeli" class="form-label">ID Pembeli</label>
                <input type="text" class="form-control" id="id_pembeli" name="id_pembeli">
            </div>
            <div class="mb-3">
                <label for="id_pembayaran" class="form-label">ID Pembayaran</label>
                <input type="text" class="form-control" id="id_pembayaran" name="id_pembayaran">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>


@stop