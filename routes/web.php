<?php

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

use App\Http\Controllers\DownloadBoilerplate;
use App\Http\Controllers\RedirectFromGithub;
use App\Http\Controllers\RedirectToGithub;

Route::get('/', function () {
    $user = auth()->check() ? auth()->user() : new stdClass();

    return view('welcome', [
        'user' => $user
    ]);
});

Route::get('/auth/github', RedirectToGithub::class);
Route::get('/auth/github/callback', RedirectFromGithub::class);
Route::post('/boilerplate', DownloadBoilerplate::class);