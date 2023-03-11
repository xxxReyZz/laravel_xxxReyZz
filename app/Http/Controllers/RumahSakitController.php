<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_rs = RumahSakit::get();
        return view(
            'rs.index',
            [
                'list_rs' => $list_rs
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('rs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $email = $request->input('email');
        $telepon = $request->input('telepon');

        RumahSakit::create([
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'telepon' => $telepon
        ]);

        return redirect('/rs');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $id)
    {
        $rs = RumahSakit::find($id);
        if(!$rs){
            return redirect('/rs');
        }

        $id = $rs->id;
        $nama = $rs->nama;
        $alamat = $rs->alamat;
        $email = $rs->email;
        $telepon = $rs->telepon;

        return view('rs.edit', [
            'id' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'telepon' => $telepon
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $rs = RumahSakit::find($id);
        if(!$rs){
            return redirect('/rs/'.$id.'/edit');
        }

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $email = $request->input('email');
        $telepon = $request->input('telepon');

        $rs->nama = $nama;
        $rs->alamat = $alamat;
        $rs->email = $email;
        $rs->telepon = $telepon;

        $rs->save();

        return redirect('/rs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $rs = RumahSakit::find($id);
        if(!$rs){
            return redirect('/rs');
        }

        RumahSakit::destroy($id);
        return redirect('/rs');
    }
}
