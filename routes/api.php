<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/set_po', [ApiController::class, 'set_po']);
Route::get('/get_departments', [ApiController::class, 'get_departments']);
Route::get('/get_sessions', [ApiController::class, 'get_sessions']);
Route::get('/get_teachers', [ApiController::class, 'get_teachers']);
Route::get('/get_courses/{email}', [ApiController::class, 'get_courses']);
Route::get('/test', [ApiController::class, 'test']);