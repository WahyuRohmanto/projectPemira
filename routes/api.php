<?php

use App\Http\Controllers\DPTController;
use App\Http\Controllers\RegisFromNimController;
use App\Http\Controllers\Admin\VotingController;
use App\Http\Controllers\LiveCountController;
use App\Http\Controllers\GetUserPasswordController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/checkNim', [RegisterController::class, 'check'])->name('check-nim');
Route::put('/voting', [VotingController::class, 'vote'])->name('voting');
Route::get('/live_count', [LiveCountController::class, 'liveCount'])->name('live-count');
Route::post('/cekDPT', [DPTController::class, 'inPdex'])->name('cek-dpt');
Route::get('/cek-kandidat/{nim}', [DPTController::class, 'cekKandidat'])->name('cek-kandidat');
Route::get('/get_user_password/{nim}', [GetUserPasswordController::class, 'getUserPassword']);
