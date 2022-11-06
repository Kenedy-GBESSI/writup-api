<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\ChapterController;
use App\Http\Controllers\API\ParagraphController;
use App\Http\Controllers\API\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['books' => BookController::class]);
Route::apiResources(['chapters' => ChapterController::class]);
Route::apiResources(['paragraphs' => ParagraphController::class]);
Route::apiResources(['users' => UserController::class]);
Route::controller(AuthController::class)->prefix('auth')->group(
    function () {
        Route::post('register', 'register')->name('register');
        Route::post('login', 'login')->name('login');
    }
);
