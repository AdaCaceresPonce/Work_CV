<?php

use App\Http\Controllers\Admin\AboutUsPageContentController;
use App\Http\Controllers\Admin\ClinicInformationController;
use App\Http\Controllers\Admin\ContactUsPageContentController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\OpinionController;
use App\Http\Controllers\Admin\OurProfessionalsPageContentController;
use App\Http\Controllers\Admin\OurServicesPageContentController;
use App\Http\Controllers\Admin\OurTrainingsPageContentController;
use App\Http\Controllers\Admin\ProfessionalController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\WelcomePageContentController;
use App\Models\ClinicInformation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $clinicInformation = ClinicInformation::first();
    return view('admin.dashboard', compact('clinicInformation'));
})->name('dashboard');

Route::resource('servicios', ServiceController::class)->names('services')->parameters([
    'servicios' => 'service'
]);

Route::resource('capacitaciones', TrainingController::class)->names('trainings')->parameters([
    'capacitaciones' => 'training'
]);

Route::resource('specialties', SpecialtyController::class);
Route::resource('professionals', ProfessionalController::class);
Route::resource('clinic_information', ClinicInformationController::class);

Route::resource('inquiries', InquiryController::class);
Route::resource('opinions', OpinionController::class);


Route::resource('welcome_page_content', WelcomePageContentController::class);
Route::resource('about_us_page_content', AboutUsPageContentController::class);
Route::resource('our_services_page_content', OurServicesPageContentController::class);
Route::resource('our_trainings_page_content', OurTrainingsPageContentController::class)->names('our_trainings_page_content');

Route::resource('our_professionals_page_content', OurProfessionalsPageContentController::class);
Route::resource('contact_us_page_content', ContactUsPageContentController::class);


