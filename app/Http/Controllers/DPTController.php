<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class DPTController extends Controller
{
    private $response;

    public function __construct()
    {
        $this->response = [
            'status' => '',
            'data' => '',
            'message' => ''
        ];
    }

    public function index(Request $request)
    {
        $nim = $request->input('nim');
        $data = User::where('nim', $nim)->first();
        if (empty($data)) {
            $this->response = [
                'status' => 'Failed',
                'message' => 'Data Not Found',
            ];
            return response($this->response, 404);
        } else {
            $this->response = [
                'status' => 'Success',
                'data' => $data,
                'message' => 'Data Found',
            ];
            return response($this->response, 200);
        }
    }

    public function cekKandidat($nim)
    {
        $data = User::where('nim', $nim)->first();
        if (empty($data)) {
            $this->response = [
                'status' => 'Failed',
                'message' => 'Data Not Found',
            ];
            return response($this->response, 404);
        } else {
            $this->response = [
                'status' => 'Success',
                'data' => $data,
                'message' => 'Data Found',
            ];
            return response($this->response, 200);
        }
    }
}
