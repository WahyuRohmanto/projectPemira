<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  public function index()
  {
    $mahasiswa = count(User::all());
    $regis_user = count(User::where('status', '=', '1')->get());
    $regis_count = $regis_user / $mahasiswa * 100;
    return view('pages.admin.dashboard', compact(['mahasiswa', 'regis_user', 'regis_count']));
  }

  public function voting()
  {
    return view('pages.admin.voting');
  }
}
