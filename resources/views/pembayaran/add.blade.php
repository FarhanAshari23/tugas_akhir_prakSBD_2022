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

        <h5 class="card-title fw-bolder mb-3">Tambah Metode Pembayaran</h5>

		<form method="post" action="{{ route('pembayaran.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_pembayaran" class="form-label">ID Pembayaran</label>
                <input type="text" class="form-control" id="id_pembayaran" name="id_pembayaran">
            </div>
			<div class="mb-3">
                <label for="nama_produk" class="form-label">Jenis Pembayaran</label>
                <input type="text" class="form-control" id="jenis_pembayaran" name="jenis_pembayaran">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop