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
use App\Http\Controllers\ServeFont;

Route::get('/', function () {
    $user = auth()->check() ? auth()->user() : new stdClass();

    return view('index', [
        'user' => $user
    ]);
});
Route::post('/boilerplate', DownloadBoilerplate::class);

// The licensed webfonts aren't in this public repository. On Cloud they live in the
// object storage bucket; stream them from there so they stay same-origin (no CORS).
Route::get('/fonts/{file}', ServeFont::class)->where('file', '[A-Za-z0-9._-]+\\.(woff2?|ttf|otf)');
