<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
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

Route::get('/', function () {
    return view('app');
});

Route::get('/chat', function() {
    return view('chat');
})->middleware('auth:sanctum');

Route::post('messages', function (\Illuminate\Http\Request $request) {
    event(new \App\Events\SendMessage($request->all()));

    dispatch(new \App\Jobs\WriteMessageFromChatIntoDB($request->all()))->afterResponse();
})->middleware('auth:sanctum');

Route::get('/dialog/{dialog}', function (App\Models\Dialog $dialog) {
    return response()->json($dialog, 200);
})->middleware('auth:sanctum');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
