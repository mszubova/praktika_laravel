<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('report.index');
})->name('home');

// ✅ Reports — только для авторизованных
Route::middleware('auth')->group(function () {

    Route::get('/reports', [ReportController::class, 'index'])->name('report.index');

    Route::get('/reports/create', function () {
        return view('report.create');
    })->name('reports.create');

    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');

    Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
    Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');

    Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');

    // ✅ profile (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ dashboard (Breeze) — после входа отправляем в /reports
Route::get('/dashboard', function () {
    return redirect()->route('report.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
