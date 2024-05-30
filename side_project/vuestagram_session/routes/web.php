<?php

use App\Http\Controllers\BoardController;
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

Route::get('/{any}', function() {
    return view('welcome');
})->where('any', '^(?!api).*$');

Route::post('/api/login', [UserController::class, 'login']);
Route::post('/api/registration', [UserController::class, 'registration']);
Route::middleware('auth')->post('/api/logout', [UserController::class, 'logout']);

// 게시글 관련
Route::middleware('auth')->get('/api/board', [BoardController::class, 'index']);
Route::middleware('auth')->get('/api/board/{id}', [BoardController::class, 'moreIndex']);
// 게시글 작성
Route::middleware('auth')->post('/api/createBoard', [BoardController::class, 'insertBoard']);
//게시글 삭제
Route::middleware('auth')->delete('/api/deleteBoard/{id}',[BoardController::class, 'deleteBoard']);
 