<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;

Route::view('/', 'pages.project')->name('page.project');
Route::get('/wohnen', [ApartmentController::class, 'living'])->name('page.living');
Route::get('/arbeiten', [ApartmentController::class, 'working'])->name('page.working');
Route::view('/lage', 'pages.location')->name('page.location');
Route::view('/facts', 'pages.facts')->name('page.facts');
Route::view('/kontakt', 'pages.contact')->name('page.contact');
Route::view('/impressum', 'pages.imprint')->name('page.imprint');
Route::view('/datenschutz', 'pages.privacy')->name('page.privacy');
