<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = User::all();
        return view('pages.admin.mahasiswa', compact('mahasiswa'));
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
        $mahasiswa = new User;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->name = $request->nama;
        $mahasiswa->email = $request->email;
        $mahasiswa->tahun = $request->thn_masuk;
        $mahasiswa->save();

        Alert::success('Berhasil', 'Data Mahasiswa ' . $request->nama . ' Berhasil Ditambahkan');

        return redirect('admin/mahasiswa');
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
        $mahasiswa = User::find($id);
        return view('pages.admin.mahasiswa', compact('mahasiswa'));
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
        $mahasiswa = User::find($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->name = $request->nama;
        $mahasiswa->email = $request->email;
        if ($request->password != "") {
            $mahasiswa->password = Hash::make($request->password);
        }
        $mahasiswa->tahun = $request->thn_masuk;
        $mahasiswa->save();

        return redirect('admin/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = User::findOrFail($id);
        Alert::success('Berhasil', 'Data Mahasiswa ' . $mahasiswa->nama . ' Berhasil DiHapus');
        $mahasiswa->delete();

        return redirect('admin/mahasiswa');
    }
}
