<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvestorDepositController;

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

    // Route::get('/investor/projects/status', [DashboardController::class, 'projectStatus'])
    //     ->name('investor.projects.status');
    // Route::get('/investor/deposits', [InvestorDepositController::class, 'index'])
    //     ->name('investor.deposits.index');
        Route::prefix('investor')->name('investor.')->group(function () {
            Route::resource('deposits', InvestorDepositController::class)->except(['show']);
            Route::get('deposits/trashed', [InvestorDepositController::class, 'trashed'])->name('deposits.trashed');
            Route::post('deposits/{id}/restore', [InvestorDepositController::class, 'restore'])->name('deposits.restore');
            Route::delete('deposits/{id}/force-delete', [InvestorDepositController::class, 'forceDelete'])->name('deposits.forceDelete');
        });

    // Route::get('/investor/reports', [DashboardController::class, 'financialReports'])
    //     ->name('investor.reports');

    Route::post('/investor/reports/upload', [DashboardController::class, 'uploadReport'])
        ->name('investor.reports.upload');

    // Route::get('/investor/strategy-access', [DashboardController::class, 'strategyAccess'])
    //     ->name('investor.strategy.access');

    Route::get('/investor/education', [DashboardController::class, 'investorEducation'])
        ->name('investor.education');
        
    // Route::get('/investor/live', [DashboardController::class, 'liveUpdates'])
    //     ->name('investor.live');
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
        Route::post('/investor/docs/upload', [DashboardController::class, 'privateDocsUpload'])
        ->name('investor.docs.upload');


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
    // Route::get('/investor/support-help', [DashboardController::class, 'supportHelp'])
    //     ->name('investor.support-help');
});

// If someone hits a random URL, send to login (or dashboard if already in)
Route::fallback(function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});
