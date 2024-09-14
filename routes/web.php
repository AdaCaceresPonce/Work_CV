<?php

use App\Http\Controllers\Web\AboutUsController;
use App\Http\Controllers\Web\ContactUsController;
use App\Http\Controllers\Web\OurProfessionalsController;
use App\Http\Controllers\Web\OurServicesController;
use App\Http\Controllers\Web\OurTrainingsPageController;
use App\Http\Controllers\Web\ProfessionalProfilePageController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/about_us', [AboutUsController::class, 'index'])->name('about_us.index');
Route::get('/our_professionals', [OurProfessionalsController::class, 'index'])->name('our_professionals.index');
Route::get('/our_services', [OurServicesController::class, 'index'])->name('our_services.index');
Route::get('/our_services/{service}', [OurServicesController::class, 'show_service'])->name('our_services.show_service');

//Capacitaciones
Route::get('/nuestras_capacitaciones', [OurTrainingsPageController::class, 'index'])->name('our_trainings.index');
Route::get('/nuestras_capacitaciones/{training}', [OurTrainingsPageController::class, 'show_training'])->name('our_trainings.show_training');
Route::get('/mi_curriculum', [ProfessionalProfilePageController::class, 'index'])->name('professional_profile.index');
Route::get('/contact_us/{training?}', [ContactUsController::class, 'index'])->name('contact_us.index');

// Route::get('/about-us', function () {
//     return view('about_us.about_us');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
