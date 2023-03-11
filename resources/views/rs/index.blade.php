@extends('layout')

@section('title', 'Index')

@section('content')
<h1>List RS</h1>
<a class="btn btn-success" href="/rs/create"><i class="fa fa-plus"></i> Tambah RS</a>
<table class="table table-light table-hover">
    <thead>
        <tr>
            <td>Nama</td>
            <td>Alamat</td>
            <td>Email</td>
            <td>Telepon</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($list_rs as $rs)
        <tr>
            <td>{{ $rs->nama }}</td>
            <td>{{ $rs->alamat }}</td>
            <td>{{ $rs->email }}</td>
            <td>{{ $rs->telepon }}</td>
            <td><a class="btn btn-primary btn-sm" href="/rs/{{ $rs->id }}/edit"><i class="fa fa-pencil"></i> Ubah</a> <a class="btn btn-danger btn-sm" href="/rs/{{ $rs->id }}/destroy"><i class="fa fa-trash"></i> Hapus</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection