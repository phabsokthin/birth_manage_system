<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BirthCertificateController;
use App\Http\Controllers\FatherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\CommunetController;
use App\Http\Controllers\CopyBirhtCertificateController;
use App\Http\Controllers\CopyBirthController;
use App\Http\Controllers\DistrictController;

use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UserController;
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


Route::group(['middleware' => 'guest'], function () {
    Route::get("/", [AuthController::class, 'index'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('regis');
    Route::post('/create_register', [AuthController::class, 'register_create'])->name('create.registers');
    Route::post('/login_create', [AuthController::class, 'login'])->name('create.login');
});


Route::group(['middleware' => 'auth'], function () {

    Route::get("/test", [HomeController::class, 'test'])->name('testing');
    Route::get('/test2', [HomeController::class, 'testing2'])->name('test2');

    Route::controller(FatherController::class)->group(function () {
        Route::get('/tab_father', 'index')->name('tab.father');
        Route::get('/provinces/{provinceId}/districts', 'getDistrictsByProvince');
        Route::get('/districts/{districtId}/communes',  'getCommunesByDistrict');
        Route::get('/communes/{communeId}/villages',  'getVillageByCommune');
        Route::post('/create', 'create')->name('create.father');
        Route::get('/delete/{id}', 'delete_father')->name('delete.father');
        Route::get("/father/{id}", 'update')->name('update.father');
        Route::post('/update/{id}', "update_father")->name('update_father.father');
        Route::get('/viewDetail/{id}', "view_details")->name('view_details.father');
    });

    Route::controller(MotherController::class)->group(function () {
        Route::get('/tab_mother', 'index')->name('tab.mother');
        Route::post('/create_mother', 'create')->name('create.mother');
        Route::get('/delete_mother/{id}', 'delete_mother')->name('delete.mother');
        Route::get('/fetch_mother/{id}', 'fetch_mother')->name('fetch_mother.mother');
        Route::post('/update_mother/{id}', "update_mother")->name('update_mother.mother');
        Route::get('/viewDetailsMother/{id}', "view_details")->name('view_details.mother');
    });

    Route::controller(BirthCertificateController::class)->group(callback: function () {
        Route::get('/tab_certificate', 'index')->name('tab.birthcertificate');
        Route::get('/get-fathers', 'getFathers');
        Route::get('/get-mothers', 'getMothers');
        Route::get('/get-father-details/{id}', 'getFatherDetails');
        Route::get('/get-mother-details/{id}', 'getMotherDetails');
        Route::post('/create_birthCertificate', 'create')->name('create.birthCertificate');
        Route::get('/delete_birthCertificate/{id}', 'delete_birth')->name('delete.birthCertificate');
        Route::get('/get_birthCertificateById/{id}', 'get_birth_certificate_Id')->name('get_birth.birthCertificate');
        Route::post('/update_birth_certificate/{id}', 'update_birth_certificate')->name('update_.birth_certificate');
        Route::get('/print_certificate', 'print_birth_certificate')->name('print_birth_certificate');
        Route::get('/print_Certificate/{id}', action: 'print_village_certificate_id')->name('print_certificate.birth_certificate');
    });
    Route::controller(CopyBirthController::class)->group(function () {
        Route::get('/tab_copy_certificate', 'index')->name('copytab.birthcertificate');
        Route::get('/get-fathers', 'getFathers');
        Route::get('/get-mothers', 'getMothers');
        Route::get('/get-father-details/{id}', 'getFatherDetails');
        Route::get('/get-mother-details/{id}', 'getMotherDetails');
        Route::post('/create_copy_birth', 'create')->name('create_copy.birthCertificate');
        Route::get('/delete_copy_birthCertificate/{id}', 'delete_copy_birth')->name('delete_copy.birthCertificate');
        Route::get('/get_copybirhtById/{id}', 'get_birth_certificate_Id')->name('get_Copy_birth.birthCertificate');
        Route::post('/update_copy_birth/{id}', 'update_copy_birth')->name('update_copy.birth_certificate');
        Route::get('/print_copy_certificate', 'print_copy_birth')->name('print_copy_birth_certificate');
        Route::get('/print_copy_Certificate/{id}', action: 'print_copy_certificate_id')->name('print.copy_birth_certificate');
    });
    

    Route::get("/home", [HomeController::class, 'index'])->name('dashbaord');
    Route::get("/test", [HomeController::class, 'test'])->name('testing');
    Route::get('/test2', [HomeController::class, 'testing2'])->name('test2');
    Route::controller(FatherController::class)->group(function () {
        Route::get('/tab_father', 'index')->name('tab.father');
    });



    Route::controller(ProvinceController::class)->group(function () {
        Route::get('/province', 'index')->name('province.index');
        Route::post('/province_create', 'store')->name('province.store');
        Route::put('/province/{province_id}', 'update')->name('province.update');
        Route::delete('/province/{province_id}', 'destroy')->name('province.destroy');
        Route::get('/province/{province_id}', 'show')->name('province.show');
        Route::delete('/province_deleteall', 'deleteall')->name('province.deleteall');
        Route::patch('/province/status/{provinceId}', 'updateStatus')->name('province.updateStatus');
    });

    Route::patch('/province/status/{provinceId}', [ProvinceController::class, 'updateStatus']);


    Route::controller(DistrictController::class)->group(function () {
        Route::get('/district', 'index')->name('district.index');
        Route::get('/district_show', 'create')->name('district.create');
        Route::post('/district_create', 'store')->name('district.store');
        Route::put('/district/{district_id}', 'update')->name('district.update');
        Route::delete('/district/{district_id}', 'destroy')->name('district.destroy');
        Route::get('/district/{district_id}', 'show')->name('district.show');
        Route::delete('/district_deleteall', 'deleteAll')->name('districts.deleteall');
    });
    Route::patch('/district/status/{district_id}', [DistrictController::class, 'toggleStatus'])->name('district.status');

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


    Route::controller(ReportsController::class)->group(function () {
        Route::get('/report_birth', 'report_birth')->name('report_birth');
        Route::get('/parent_report', 'parentReport')->name('parentReport.report');
        Route::get('/motherReport', 'motherReport')->name('motherReport.report');
        Route::get('/report_copy_brith', 'report_copy_brith')->name('report_copy_brith.report');
    });


    Route::delete('/logout_index', [AuthController::class, 'logout'])->name('logout');
});
