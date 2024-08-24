<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InternationalCompanyController;
use App\Http\Controllers\DomesticCompanyController;
use App\Http\Controllers\SurveyorController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ROAController;
use App\Http\Controllers\MvController;
use App\Http\Controllers\CoaController;

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
    return view('welcome');
});

Route::get('/dashboards', [DashboardController::class, 'index'])->name('dashboard.index');
// Explicit Routes
Route::get('/shipments', [ShipmentController::class, 'index'])->name('shipments.index');
Route::get('/shipments/create', [ShipmentController::class, 'create'])->name('shipments.create');
Route::post('/shipments', [ShipmentController::class, 'store'])->name('shipments.store');
Route::get('/shipments/{shipment}/edit', [ShipmentController::class, 'edit'])->name('shipments.edit');
Route::put('/shipments/{shipment}', [ShipmentController::class, 'update'])->name('shipments.update');
Route::delete('/shipments/{shipment}', [ShipmentController::class, 'destroy'])->name('shipments.destroy');

Route::resource('shipments', ShipmentController::class); // untuk controller bulan dan tahun


Route::get('/get-companies', [ShipmentController::class, 'getCompanies'])->name('shipments.getCompanies');






Route::get('/domestic-companies', [DomesticCompanyController::class, 'index'])->name('domestic_companies.index');
Route::get('/domestic-companies/create', [DomesticCompanyController::class, 'create'])->name('domestic_companies.create');
Route::post('/domestic-companies', [DomesticCompanyController::class, 'store'])->name('domestic_companies.store');
Route::get('/domestic-companies/{domesticCompany}/edit', [DomesticCompanyController::class, 'edit'])->name('domestic_companies.edit');
Route::put('/domestic-companies/{domesticCompany}', [DomesticCompanyController::class, 'update'])->name('domestic_companies.update');
Route::delete('/domestic-companies/{domesticCompany}', [DomesticCompanyController::class, 'destroy'])->name('domestic_companies.destroy');






Route::get('/international-companies', [InternationalCompanyController::class, 'index'])->name('international_companies.index');
Route::get('/international-companies/create', [InternationalCompanyController::class, 'create'])->name('international_companies.create');
Route::post('/international-companies', [InternationalCompanyController::class, 'store'])->name('international_companies.store');
Route::get('/international-companies/{internationalCompany}/edit', [InternationalCompanyController::class, 'edit'])->name('international_companies.edit');
Route::put('/international-companies/{internationalCompany}', [InternationalCompanyController::class, 'update'])->name('international_companies.update');
Route::delete('/international-companies/{internationalCompany}', [InternationalCompanyController::class, 'destroy'])->name('international_companies.destroy');






// Route untuk menampilkan daftar surveyor
Route::get('/surveyors', [SurveyorController::class, 'index'])->name('surveyors.index');

// Route untuk menampilkan formulir pembuatan surveyor baru
Route::get('/surveyors/create', [SurveyorController::class, 'create'])->name('surveyors.create');

// Route untuk menyimpan surveyor baru
Route::post('/surveyors', [SurveyorController::class, 'store'])->name('surveyors.store');

// Route untuk menampilkan formulir pengeditan surveyor tertentu
Route::get('/surveyors/{surveyor}/edit', [SurveyorController::class, 'edit'])->name('surveyors.edit');

// Route untuk memperbarui surveyor tertentu
Route::put('/surveyors/{surveyor}', [SurveyorController::class, 'update'])->name('surveyors.update');

// Route untuk menghapus surveyor tertentu
Route::delete('/surveyors/{surveyor}', [SurveyorController::class, 'destroy'])->name('surveyors.destroy');



Route::get('/index', [ExportController::class, 'index'])->name('index');
Route::get('/export', [ExportController::class, 'export'])->name('export');



Route::resource('roa', ROAController::class);
// routes/web.php

Route::resource('mv', MvController::class);
Route::post('/mv', [MVController::class, 'store'])->name('mv.store');

Route::get('/shipments/search', [ShipmentController::class, 'search'])->name('shipments.search');

// routes/web.php

Route::resource('coa', CoaController::class);









