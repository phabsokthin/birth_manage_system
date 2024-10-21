<?php

use App\Http\Controllers\FatherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('dashboard.dashboard');
// });

Route::get("/", [HomeController::class, 'index'])->name('dashbaord');

Route::get("/test", [HomeController::class, 'test'])->name('testing');
Route::get('/test2', [HomeController::class, 'testing2'])->name('test2');

Route::controller(FatherController::class)->group(function(){
    Route::get('/tab_father', 'index')->name('tab.father');
});
