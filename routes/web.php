<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\CommercialObjectController;
use App\Http\Controllers\Admin\LoginController;

Route::view('/', 'pages.project')->name('page.project');
Route::get('/wohnen', [ApartmentController::class, 'living'])->name('page.living');
Route::get('/arbeiten', [ApartmentController::class, 'working'])->name('page.working');
Route::view('/lage', 'pages.location')->name('page.location');
Route::view('/facts', 'pages.facts')->name('page.facts');
Route::view('/kontakt', 'pages.contact')->name('page.contact');
Route::post('/kontakt', [ContactController::class, 'send'])->name('contact.send');
Route::view('/impressum', 'pages.imprint')->name('page.imprint');
Route::view('/datenschutz', 'pages.privacy')->name('page.privacy');

/*
 * Gewerbeverwaltung – die Gewerbeobjekte sind nicht in Melon/emonitor
 * abgebildet und werden hier gepflegt. Zugang anlegen: php artisan shift:user
 */
Route::prefix('admin')->group(function () {
  Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->middleware('throttle:6,1');
  });

  Route::middleware('auth')->group(function () {
    Route::get('/', [CommercialObjectController::class, 'index'])->name('admin.objects.index');
    Route::put('/', [CommercialObjectController::class, 'update'])->name('admin.objects.update');
    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
  });
});
