<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MethodsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PestController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AboutController;
use App\Models\Project;
use Illuminate\Support\Str;

Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance.page');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/test-email', [ContactController::class, 'testEmail'])->name('test.email');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact_us', [ContactController::class, 'index'])->name('contact.us');
Route::post('/store', [ContactController::class, 'store'])->name('store-contact');
Route::post('/footer-form', [ContactController::class, 'storeAll'])->name('footerForm.store');
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::middleware('web')->group(function () {
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/project/detail/{id_project}/{id_project_type}', [ProjectController::class, 'detail'])->name('project.detail');
});

Route::get('/download-brochure', [ContactController::class, 'downloadBrochure'])->name('downloadBrochure');


