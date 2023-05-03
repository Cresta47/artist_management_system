<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\UserController;
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


Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => ["super_admin"]], function() {
        Route::resource("user", UserController::class);
    });

    Route::get("user/profile/show", [UserController::class, "profile"])->name("user.profile");
    Route::post("user/profile/change_password", [UserController::class, "changePassword"])->name("user.profile.change_password");

    Route::resource("artist", ArtistController::class);

    Route::resource("artist.music", MusicController::class, );
    Route::get("artist/{artistId}/import/music/csv", [MusicController::class, "showImportMusicForm"])->name("artist.music.import");
    Route::post("artist/{artistId}/import/music/csv", [MusicController::class, "importMusic"])->name("artist.music.import.store");

    // Route::get("music", [MusicController::class, "myMusicIndex"])->name("my.music.index");





});

