<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $token = csrf_token();
    $sessionId = $request->session()->getId();
    return response()->json([
        'csrf_token' => $token,
        'session_id' => $sessionId,
        'session_data' => $request->session()->all(),
    ]);
});