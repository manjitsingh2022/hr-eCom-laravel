<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/change-password', [ApiController::class, 'changepassword']);
Route::middleware(['api', 'auth:sanctum'])->group(function () {
    Route::post('/me', [ApiController::class, 'me']);
    Route::get('/all', [ApiController::class, 'users']);
});

Route::get('/products',[ApiController::class,'products']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);