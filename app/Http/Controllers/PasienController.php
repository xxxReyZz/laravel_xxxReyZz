<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_pasien = Pasien::get();
        $list_rs = RumahSakit::get();
        return view(
            'pasien.index',
            [
                'list_pasien' => $list_pasien,
                'list_rs' => $list_rs
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $list_rs = RumahSakit::get();
        return view('pasien.create', [
            'list_rs' => $list_rs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telp');
        $id_rs = $request->input('id_rs');

        Pasien::create([
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'id_rs' => $id_rs
        ]);

        return redirect('/pasien');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $id)
    {
        $pasien = Pasien::find($id);
        if(!$pasien){
            return redirect('/pasien');
        }

        $id = $pasien->id;
        $nama = $pasien->nama;
        $alamat = $pasien->alamat;
        $no_telp = $pasien->no_telp;
        $id_rs = $pasien->id_rs;

        return view('pasien.edit', [
            'id' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'id_rs' => $id_rs
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $pasien = Pasien::find($id);
        if(!$pasien){
            return redirect('/pasien/'.$id.'/edit');
        }

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telp');
        $id_rs = $request->input('id_rs');

        $pasien->nama = $nama;
        $pasien->alamat = $alamat;
        $pasien->no_telp = $no_telp;
        $pasien->id_rs = $id_rs;

        $pasien->save();

        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pasien = Pasien::find($id);
        if(!$pasien){
            return redirect('/pasien');
        }

        Pasien::destroy($id);
        return redirect('/pasien');
    }

    public function filter_rs(int $id_rs){
        $list_pasien = Pasien::where('id_rs', $id_rs)->get();
        $rs = RumahSakit::find($id_rs);

        return [
            'list_pasien' => $list_pasien,
            'rs' => $rs
        ];
    }
}
