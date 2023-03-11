@extends('layout')

@section('title', 'Index')

@section('content')
<h1>List Pasien</h1>
<div class="row mb-3">
    <div class="col-md-4">
        <a class="btn btn-success" href="/pasien/create"><i class="fa fa-plus"></i> Tambah Pasien</a>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <select name="filter_rs" id="filter_rs" class="form-control"><option value="" selected disabled>Filter by RS</option>@foreach($list_rs as $rs) <option value="{{ $rs->id }}">{{ $rs->nama }}</option> @endforeach</select>
    </div>
</div>
<table class="table table-light table-hover">
    <thead>
        <tr>
            <td>Nama</td>
            <td>Alamat</td>
            <td>No Telp</td>
            <td>RS</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody id="pasien_data">
        @foreach($list_pasien as $pasien)
        <tr>
            <td>{{ $pasien->nama }}</td>
            <td>{{ $pasien->alamat }}</td>
            <td>{{ $pasien->no_telp }}</td>
            <td>{{ $pasien->rs->nama }}</td>
            <td><a class="btn btn-primary btn-sm" href="/pasien/{{ $pasien->id }}/edit"><i class="fa fa-pencil"></i> Ubah</a> <a class="btn btn-danger btn-sm" href="/pasien/{{ $pasien->id }}/destroy"><i class="fa fa-trash"></i> Hapus</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('javascript')
<script>
$(document).ready(function(){
    let filter_rs = $('#filter_rs');
    filter_rs.change(function(){
        let id_rs_selected = filter_rs.find('option:selected').val();
        $.ajax({
            url: 'http://127.0.0.1:8000/pasien/filter_rs/'+id_rs_selected,
            method: 'GET',
            success: function(data){
                let list_pasien = data.list_pasien
                $('#pasien_data').html('')
                list_pasien.forEach(function(item){
                    $('#pasien_data').html(`<tr>
                                <td>${item.nama}</td>
                                <td>${item.alamat}</td>
                                <td>${item.no_telp}</td>
                                <td>${data.rs.nama}</td>
                                <td><a class="btn btn-primary btn-sm" href="/pasien/${item.id}/edit"><i class="fa fa-pencil"></i> Ubah</a> <a class="btn btn-danger btn-sm" href="/pasien/${item.id}/destroy"><i class="fa fa-trash"></i> Hapus</a></td>
                    </tr>`)
                })
            },
            error: function(textStatus, errorThrown){
                console.log(textStatus)
            }
        })
    })
})
</script>
@endsection