<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::get('/', function () {
    return view('home');
})->name('home');
 
Route::get('/about', [UserController::class, 'about'])->name('about');
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
 
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
});
 
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
 
    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');
 
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin/products/store');
    Route::get('/admin/products/show/{id}', [ProductController::class, 'show'])->name('admin/products/show');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
    Route::delete('/admin/products/destroy/{id}', [ProductController::class, 'destroy'])->name('admin/products/destroy');

});

Route::prefix('admin')->group(function () {
    Route::get('/teams', [TeamController::class, 'adminIndex'])->name('adminteam.index');
    Route::get('/admin/teams', [TeamController::class, 'adminIndex'])->name('admin.teams');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('team.store');
    Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/teams/{team}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('team.destroy');

    Route::get('/teams/{team}/players/create', [PlayerController::class, 'create'])->name('player.create');
    Route::post('/teams/{team}/players', [TeamController::class, 'createPlayer'])->name('player.createPlayer');
    Route::get('/teams/{team}/players', [PlayerController::class, 'index'])->name('admin.teams.players');
    Route::get('/players/{player}/edit', [PlayerController::class, 'edit'])->name('player.edit');
    Route::put('/players/{player}', [PlayerController::class, 'update'])->name('player.update');
    Route::delete('/players/{player}', [PlayerController::class, 'destroy'])->name('player.destroy');


});

Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournaments.index');

// Route::get('/tournaments/{tourID}/matches', 'TournamentController@showMatches')->name('matches.index');
// Route::get('/tournament/{id}/matches', 'TournamentController@showMatches')->name('tournament.matches');
// Route::get('/tournament/{id}/matches', 'App\Http\Controllers\TournamentController@showMatches')->name('tournament.matches');
Route::get('/tournament/{TourID}/matches', [TournamentController::class, 'showMatches'])->name('tournament.matches');

Route::get('/tournaments/{match}/book', [TicketController::class, 'showBookingForm'])->name('matches.book');
Route::post('/tournaments/{match}/book', [TicketController::class, 'bookTickets'])->name('matches.book.post');

// Route::post('/matches/book/{match}', 'TicketController@bookTickets')->name('matches.book.post');


Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/team/{teamId}/players', [TeamController::class, 'showPlayers'])->name('team.players');



Route::get('/ticket/{ticket_id}', [TicketController::class, 'show'])->name('ticket.show');


