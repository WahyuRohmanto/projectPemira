<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GetUserPasswordController extends Controller
{
    function getUserPassword($nim)
    {
        $user = User::where('nim',$nim)->first();
        $data = [
            'status' => 'success',
            'message' => 'User data fetched successfully',
            'code' => 200,
            'data' => $user,
        ];
        return response($data, 200);
    }
}
