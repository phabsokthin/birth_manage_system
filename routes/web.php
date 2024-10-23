<?php
use App\Http\Controllers\BirthCertificateController;
use App\Http\Controllers\FatherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\CommunetController;
use App\Http\Controllers\DistrictController;

use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\VillageController;

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


Route::controller(MotherController::class)->group(function(){
    Route::get('/tab_mother', 'index')->name('tab.mother');
});

Route::controller(BirthCertificateController::class)->group(function(){
    Route::get('/tab_certificate', 'index')->name('tab.birthcertificate');
});

Route::get("/", [HomeController::class, 'index'])->name('dashbaord');

Route::get("/test", [HomeController::class, 'test'])->name('testing');
Route::get('/test2', [HomeController::class, 'testing2'])->name('test2');

Route::controller(FatherController::class)->group(function(){
    Route::get('/tab_father', 'index')->name('tab.father');
});

Route::controller(ProvinceController::class)->group(function(){
    Route::get('/province','index')->name('province.index');
    Route::post('/province_create','store')->name('province.store');
    Route::put('/province/{province_id}', 'update')->name('province.update');
    Route::delete('/province/{province_id}', 'destroy')->name('province.destroy');
    Route::get('/province/{province_id}','show')->name('province.show');
    Route::delete('/province_deleteall', 'deleteall')->name('province.deleteall');
});

Route::patch('/province/status/{province_id}', [ProvinceController::class, 'toggleStatus'])->name('province.status');
Route::controller(DistrictController::class)->group(function () {
    Route::get('/district', 'index')->name('district.index');
    Route::get('/district_show','create')->name('district.create');
    Route::post('/district_create', 'store')->name('district.store');
    Route::put('/district/{district_id}', 'update')->name('district.update');
    Route::delete('/district/{district_id}', 'destroy')->name('district.destroy');
    Route::get('/district/{district_id}', 'show')->name('district.show');
    Route::delete('/district_deleteall', 'deleteAll')->name('districts.deleteall');
});

Route::controller(CommunetController::class)->group(function () {
    Route::get('/commune', 'index')->name('commune.index');
    Route::get('/commune_show', 'create')->name('commune.create');
    Route::post('/commune_create', 'store')->name('commune.store');
    Route::put('/commune/{commune_id}', 'update')->name('commune.update');
    Route::delete('/commune/{commune_id}', 'destroy')->name('commune.destroy');
    Route::get('/commune/{commune_id}', 'show')->name('commune.show');
    Route::delete('/commune_deleteall', 'deleteAll')->name('communes.deleteall');
});
Route::controller(VillageController::class)->group(function () {
    Route::get('/village', 'index')->name('village.index');
    Route::get('/village_show', 'create')->name('village.create');
    Route::post('/village_create', 'store')->name('village.store');
    Route::put('/village/{village_id}', 'update')->name('village.update');
    Route::delete('/village/{village_id}', 'destroy')->name('village.destroy');
    Route::get('/village/{village_id}', 'show')->name('village.show');
    Route::delete('/village_deleteall', 'deleteAll')->name('villages.deleteall');
});
