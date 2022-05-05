<?php

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'auth:sanctum'], function(){
//     Route::post('/beer/review/{id}', [ReviewController::class, 'reviewStore']);
//     Route::delete('/delete/{id}', [BeerController::class, 'delete']);
// });

// Route::get('/', [BeerController::class, 'index']);
// Route::post('register', [UserController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);
// Route::get('beer/{id}', [BeerController::class, 'getBeerById']);
