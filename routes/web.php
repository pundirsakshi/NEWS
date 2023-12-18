<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\newsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get("/",[NewsController::class,'index']);

Route::get("news",[NewsController::class,'get_data']);
Route::get("game",[NewsController::class,'Gaming']);
Route::get("tv",[NewsController::class,'TVNews']);
Route::get("web",[NewsController::class,'WebStories']);
