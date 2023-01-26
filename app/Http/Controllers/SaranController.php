<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SaranController extends Controller
{
    public function index()
    {
        $saran = Saran::with('user')->get();
        return view('pages.admin.saran', compact('saran'));
    }

    public function store(Request $request)
    {
        $saran = new Saran;
        $saran->user_id = $request->user_id;
        $saran->pesan = $request->pesan;
        $saran->save();

        Alert::success('Sukses', 'Terima Kasih Telah Mengirim Saran');
        return redirect('/');
    }
}