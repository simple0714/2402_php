<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
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

//인증 관련(인증 처리 불필요한 라우트)
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
// Route::middleware('my.auth')->post('/logout', [UserController::class, 'logout']);
// Route::middleware('my.auth')->post('/reissue',[UserController::class, 'reissue']);

//보드 관련
// Route::middleware('my.auth')->get('/board/{id}/list', [BoardController::class, 'index']);
// Route::middleware('my.auth')->get('/board/{id}', [BoardController::class, 'addIndex']);
// Route::middleware('my.auth')->post('/board', [BoardController::class, 'store']);

// middleware 그룹으로 묶기(인증 처리 필요한 라우트)
Route::middleware('my.auth')->group(function() {

// 인증 관련
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/reissue',[UserController::class, 'reissue']);

// 보드 관련
Route::get('/board/{id}/list', [BoardController::class, 'index']);
Route::get('/board/{id}', [BoardController::class, 'addIndex']);
Route::post('/board', [BoardController::class, 'store']);
});

//유효하지 않은 Path
Route::fallback(function() {
    return response()->json(['code' => 'E90']);
});
