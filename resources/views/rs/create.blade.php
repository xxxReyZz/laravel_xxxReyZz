@extends('layout')

@section('title', 'Tambah RS')

@section('content')
<h3>Tambah RS</h3>
<form action="/rs/store" method="post">
    @csrf
    <div class="mb-3">
        <label for="nama">Nama</label>:
        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama">
    </div>
    <div class="mb-3">
        <label for="alamat">Alamat</label>:
        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat">
    </div>
    <div class="mb-3">
        <label for="email">Email</label>:
        <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Email">
    </div>
    <div class="mb-3">
        <label for="telepon">Telepon</label>:
        <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Masukkan Telepon">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection