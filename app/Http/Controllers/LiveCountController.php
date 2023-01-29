<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveCountController extends Controller
{
    // public function liveCountUserHasVote()
    // {
    //     $regis = DB::select('SELECT COUNT(status) AS jumlah, tahun FROM users WHERE status=1 GROUP BY tahun');
    //     $no_regis = DB::select('SELECT COUNT(status) AS jumlah, tahun FROM users WHERE status=0 GROUP BY tahun');

    //     $this
    //     $this->response['status'] = 'Success';
    //     $this->response['data'] = ['regis' => $regis, 'no_regis' => $no_regis];
    //     $this->response['message'] = 'All Data Registered';
    //     return response($this->response, 200);
    // }

    public function liveCount()
    {
        $query = DB::select('SELECT COUNT(vote.id_kandidat) AS jumlah_suara, vote.id_kandidat, users.name as nama_presma FROM vote 
                            JOIN kandidat ON vote.id_kandidat = kandidat.id JOIN users ON users.id = kandidat.presma_id 
                            GROUP BY vote.id_kandidat');

        $data = [
            'status' => 'success',
            'message' => 'Count Data fetched successfully',
            'data' => $query,
        ];

        return response($data, 200);
    }
}