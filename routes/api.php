<?php

use App\Http\Controllers\DPTController;
use App\Http\Controllers\RegisFromNimController;
use App\Http\Controllers\Admin\VotingController;
use App\Http\Controllers\LiveCountController;
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

Route::post('/checkNim', [RegisFromNimController::class, 'check'])->name('check-nim');
// Route::post('/login', [RegisFromNimController::class, 'login'])->name('login');
Route::post('/regis', [RegisFromNimController::class, 'regis'])->name('regis');
Route::get('/countRegis', [RegisFromNimController::class, 'countRegis'])->name('count-regis');
Route::put('/voting', [VotingController::class, 'vote'])->name('voting');
// Route::get('/countVoting', [VotingController::class, 'countVoting'])->name('count-voting');
Route::get('/live_count', [LiveCountController::class, 'liveCount'])->name('live-count');
Route::post('/cekDPT', [DPTController::class, 'inPdex'])->name('cek-dpt');
Route::get('/cek-kandidat/{nim}', [DPTController::class, 'cekKandidat'])->name('cek-kandidat');
