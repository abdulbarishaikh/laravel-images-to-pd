<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;




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
    return view('form');
});

// Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
Route::post('/upload', [PDFController::class, 'upload']);
Route::post('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');