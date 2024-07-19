<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::get('/users', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);

//Route::post('/login', 'AuthController@login')->middleware('web');

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

//Route::get('/csrf-token', function (Request $request) {
//    return response()->json(['csrf_token' => csrf_token()]);
//});
//
//Route::get('/', function (Request $request) {
//    $token = csrf_token();
//    $sessionId = $request->session()->getId();
//    return response()->json([
//        'csrf_token' => $token,
//        'session_id' => $sessionId,
//        'session_data' => $request->session()->all(),
//    ]);
//});
Route::middleware('api')->get('/csrf-token', function (Request $request) {
    return response()->json(['csrf_token' => csrf_token()]);
});

