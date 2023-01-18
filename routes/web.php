<?php

use App\Http\Controllers\{
    AdminController, 
    AuthController, 
    HomeController, 
    MahasiswaController,
    VotingController,
    VoteController,
    KandidatController,
    SaranController,
    SendInvitationController,
    LiveCountController
};
use App\Models\{Kandidat, User};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/nyoba', [SendInvitationController::class, 'queueJob']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [HomeController::class, 'index']);

#livecount
Route::get('/live-count', function(){
    return view('pages.live-count');
});
Route::get('/live_count', [LiveCountController::class, 'liveCount']);
Route::get('/livecount', function () {
    event(new App\Events\GetLiveCountEvent());
});

#authenticated routes
Route::middleware('auth')->group(function(){
    Route::get('/voting', [VoteController::class, 'index']);
    Route::patch('/voting', [VoteController::class, 'vote'])->name('vote');
    Route::put('/saran', [SaranController::class, 'store'])->name('saran');
});

# admin routes
Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::get('/voting', [VotingController::class, 'index']);
    Route::get('/saran', [SaranController::class, 'index']);
    Route::resource('/kandidat', KandidatController::class);
});
