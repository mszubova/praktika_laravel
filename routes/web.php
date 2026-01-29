<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('report.index');
})->name('home');

Route::get('/reports', [ReportController::class, 'index'])->name('report.index');

Route::get('/reports/create', function () {
    return view('report.create');
})->name('reports.create');

Route::delete('/report{report}', [ReportController::class, 'destroy'])->name ('reports.destroy');

Route::post('/reports', [ReportController::class, 'store'])->name ('reports.store');

Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');

