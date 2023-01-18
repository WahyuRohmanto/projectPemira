<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class VoteController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->id);
        $id_user = Auth::user()->id;
        $checking = Vote::where('id_user', $id_user)->get();
        if (count($checking) != 0) {
            Alert::error('Perhatian', 'Anda Sudah Melakukan Voting');
            return redirect('/');
        }
        $kandidat = Kandidat::all();
        return view('pages.vote', compact('kandidat'));
    }

    public function vote(Request $request)
    {
        $cek_user = Vote::where('id_user', Auth::user()->id)->first();
        if ($cek_user !== null) {
            Alert::error('Perhatian', 'Anda Sudah Melakukan Voting');
            return redirect('/');
        } else {
            Vote::create(['id_kandidat' => $request->input('id_kandidat'), 'id_user' => Auth::user()->id]);
            Alert::success('Sukses', 'Terima Kasih Sudah Melakukan Voting');
            return redirect('/');
        }
    }
}