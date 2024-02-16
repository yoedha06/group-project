<?php

use App\Http\Controllers\TestingApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

route::get('/history', [TestingApiController::class, 'index']);
route::post('/history/store',[TestingApiController::class, 'store']);
route::get('history/{id}',[TestingApiController::class, 'edit']);
route::patch('/history/edit/{id}',[TestingApiController::class, 'update']);
route::delete('/history/delete/{id}',[TestingApiController::class, 'delete']);