@extends('layout')

@section('title', 'Tambah Pasien')

@section('content')
<h3>Tambah Pasien</h3>
<form action="/pasien/store" method="post">
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
        <label for="no_telp">No Telp</label>:
        <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Masukkan No Telp">
    </div>
    <div class="mb-3">
        <label for="id_rs">Rumah Sakit</label>:
        <select name="id_rs" id="id_rs" class="form-control">
            <option value="" selected disabled>Pilih Rumah Sakit</option>
            @foreach($list_rs as $rs)
                <option value="{{ $rs->id }}">{{ $rs->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection