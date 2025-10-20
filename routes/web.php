<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Root: bounce to login or dashboard
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
})->name('home');

// PROTECTED AREA
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/investor/projects/status', [DashboardController::class, 'projectStatus'])
        ->name('investor.projects.status');

    Route::get('/investor/reports', [DashboardController::class, 'financialReports'])
        ->name('investor.reports');

    Route::post('/investor/reports/upload', [DashboardController::class, 'uploadReport'])
        ->name('investor.reports.upload');

    Route::get('/investor/strategy-access', [DashboardController::class, 'strategyAccess'])
        ->name('investor.strategy.access');

    Route::get('/investor/education', [DashboardController::class, 'investorEducation'])
        ->name('investor.education');
        
    Route::get('/investor/live', [DashboardController::class, 'liveUpdates'])
        ->name('investor.live');
     Route::get('/investor/support', [DashboardController::class, 'support'])
        ->name('investor.support');
    Route::post('/investor/support/send', [DashboardController::class, 'supportSend'])
        ->name('investor.support.send');
        
          Route::get('/investor/future', [DashboardController::class, 'futurePreview'])
        ->name('investor.future');
    Route::post('/investor/future/interest', [DashboardController::class, 'futureInterest'])
        ->name('investor.future.interest');
        
         Route::get('/investor/docs', [DashboardController::class, 'privateDocs'])
        ->name('investor.docs');

    // Signed download URLs (prevents random guessing)
    Route::get('/investor/docs/download/{id}', [DashboardController::class, 'privateDocsDownload'])
        ->name('investor.docs.download')
        ->middleware('signed');
        
        Route::get('/investor/feedback', [\App\Http\Controllers\DashboardController::class, 'feedbackIndex'])
        ->name('investor.feedback');

    Route::post('/investor/feedback/submit', [\App\Http\Controllers\DashboardController::class, 'feedbackSubmit'])
        ->name('investor.feedback.submit');

    Route::post('/investor/feedback/poll', [\App\Http\Controllers\DashboardController::class, 'feedbackPoll'])
        ->name('investor.feedback.poll');
});

// If someone hits a random URL, send to login (or dashboard if already in)
Route::fallback(function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});
