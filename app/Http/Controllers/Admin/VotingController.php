<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class VotingController extends Controller
{
    private $response = [];

    public function index()
    {
        $data = Vote::with(['user', 'kandidat'])->get();

        return view('pages.admin.voting', compact('data'));
    }

    public function vote(Request $request)
    {
        if (Auth::check()) {
            $cek_user = Vote::where('id_user', Auth::user()->id)->first();
            if ($cek_user !== null) {
                $this->response = [
                    'status' => 'Success',
                    'message' => 'Failed because you have already vote',
                ];
                return response($this->response, 400);
            } else {
                Vote::create(['id_kandidat' => $request->input('id_kandidat'), 'id_user' => Auth::user()->id]);
                $this->response = [
                    'status' => 'Success',
                    'message' => 'Success voted',
                ];
                return response($this->response, 200);
            }
        } else {
            $this->response = [
                'status' => 'Failed',
                'message' => 'You are not login',
            ];
            return response($this->response, 500);
        }
    }

    public function countVoting()
    {
        $data = DB::select('SELECT COUNT(id_kandidat) AS jumlah_suara, id_kandidat FROM vote GROUP BY id_kandidat');

        $this->response = [
            'status' => 'Success',
            'data' => $data,
            'message' => 'Success Get Data Voting',
        ];

        return response($this->response, 200);
    }
}