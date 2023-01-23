<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveCountController extends Controller
{
    public function index()
    {
        return view('pages.live-count');
    }

    public function liveCount()
    {
        $query = DB::select('SELECT COUNT(vote.id_kandidat) AS jumlah_suara, vote.id_kandidat, kandidat.nama as nama_kandidat FROM vote JOIN kandidat ON vote.id_kandidat = kandidat.id GROUP BY vote.id_kandidat');

        $data = [
            'status' => 'success',
            'message' => 'Count Data fetched successfully',
            'data' => $query,
        ];

        return response($data, 200);
    }
}
