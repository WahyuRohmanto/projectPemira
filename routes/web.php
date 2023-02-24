<?php
use App\Http\Controllers\{
    VoteController,
    AuthController, 
    HomeController, 
    SaranController,
    SendInvitationController,
    LiveCountController,
    VisiMisiController,
};
use App\Http\Controllers\Admin\{
    AdminController, 
    MahasiswaController,
    VotingController,
    KandidatController,
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



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/', [HomeController::class, 'index']);
Route::put('/saran', [SaranController::class, 'store'])->name('saran');

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
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/voting', [VoteController::class, 'index']);
    Route::patch('/voting', [VoteController::class, 'vote'])->name('vote');
    Route::get('/selengkapnya', [VisiMisiController::class, 'selengkapnya'])->name('selengkapnya.selengkapnya');
    Route::get('/message',function(){
        return view('message');
    });
});

# admin routes
Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/send-invitation', [SendInvitationController::class, 'queueJob']);
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::get('/voting', [VotingController::class, 'index']);
    Route::get('/saran', [SaranController::class, 'index']);
    Route::resource('/kandidat', KandidatController::class);
    Route::get('cek' , function() {
        return view('cekPass');
    });
    ;
});

Route::get('test' , function() {
    return view('test');
});