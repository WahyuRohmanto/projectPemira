<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use File;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kandidat = Kandidat::all();
        return view('pages.admin.kandidat', compact('kandidat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kandidat = Kandidat::find($id);
        return view('pages.admin.kandidat', compact('kandidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        dd($request->visi);
        // dd($request->visi_misi);

        $kandidat = Kandidat::find($id);
        if (request()->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->extension();
            unlink(public_path('images/kandidat/' . $kandidat->image));
            $request->file('image')->move(public_path('images/kandidat/'), $fileName);
            $kandidat->image = $fileName;
        }

        $kandidat->nim = $request->nim;
        $kandidat->nama = $request->nama;
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->visi_misi = $request->visi_misi;

        $kandidat->save();

        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect('admin/kandidat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}