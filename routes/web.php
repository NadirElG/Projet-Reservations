<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Feed\FeedServiceProvider;


use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\TicketmasterController;
use App\Http\Controllers\FeedController;


use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\LocalityController;
use App\Http\Controllers\LocationController;

use App\Http\Controllers\ShowController;
use App\Http\Controllers\RepresentationController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\StripePaymentController;


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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
// routes/web.php


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::feeds();


Route::get('/feeds', [FeedController::class, 'index'])->name('feeds');
Route::get('/theatres', [TicketmasterController::class, 'getTheatreData'])->name('theatres');

Route::get('/shows/{id}', [ShowController::class, 'show'])->name('show.details');


Route::get('show/{id}/rss', [ShowController::class, 'rss']);


Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');
Route::get('/artist/{id}', [ArtistController::class, 'show'])
	->where('id', '[0-9]+')->name('artist.show');
Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
	->where('id', '[0-9]+')->name('artist.edit');
Route::put('/artist/{id}', [ArtistController::class, 'update'])
	->where('id', '[0-9]+')->name('artist.update');
Route::get('/artist/create', [ArtistController::class, 'create'])->name('artist.create');
Route::post('/artist', [ArtistController::class, 'store'])->name('artist.store');
Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])
	->where('id', '[0-9]+')->name('artist.delete');

Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/{id}', [TypeController::class, 'show'])
    ->where('id', '[0-9]+')->name('type.show');
Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/{id}', [RoleController::class, 'show'])
    ->where('id', '[0-9]+')->name('role.show');

Route::get('/locality', [LocalityController::class, 'index'])->name('locality.index');
Route::get('/locality/{id}', [LocalityController::class, 'show'])
    ->where('id', '[0-9]+')->name('locality.show');
Route::get('/location', [LocationController::class, 'index'])->name('location.index');
Route::get('/location/{id}', [LocationController::class, 'show'])
    ->where('id', '[0-9]+')->name('location.show');

Route::get('/show', [ShowController::class, 'index'])->name('show_index');
Route::get('/show/{id}', [ShowController::class, 'show'])
    ->where('id', '[0-9]+')->name('show_show');
//Route::get('/show/create', [ShowController::class, 'create'])->name('show.create');
//Route::post('/show', [ShowController::class, 'store'])->name('show.store');
Route::resource('show', ShowController::class)->only([
    'create', 'store'
]);

/*
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/show/create', [ShowController::class, 'create'])->name('show.create');
    Route::post('/show', [ShowController::class, 'store'])->name('show.store');
});
*/





Route::get('/representation', [RepresentationController::class, 'index'])
    ->name('representation.index');
Route::get('/representation/{id}', [RepresentationController::class, 'show'])
    ->where('id', '[0-9]+')->name('representation.show');
    
    
        
/*--------------------------------------*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')
    ->middleware('auth')
    ->name('logout');

Route::post('/stripe', [StripePaymentController::class, 'postPaymentStripe'])->name('addmoney.stripe');
//Route::post('/add-money-stripe', [StripePaymentController::class, 'postPaymentStripe'])->name('addmoney.stripe');



require __DIR__.'/auth.php';
