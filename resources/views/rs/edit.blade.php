@extends('layout')

@section('title', 'Ubah RS')

@section('content')
<h1>Ubah RS</h1>
<form action="/rs/{{ $id }}/update" method="post">
    @csrf
    <div class="mb-3">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ $nama }}">
    </div>
    <div class="mb-3">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $alamat }}">
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" value="{{ $email }}">
    </div>
    <div class="mb-3">
        <label for="telepon">Telepon</label>
        <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $telepon }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection