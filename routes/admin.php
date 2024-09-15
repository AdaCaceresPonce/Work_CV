<?php

use App\Http\Controllers\Admin\ContactInformationController;
use App\Http\Controllers\Admin\ContactUsPageContentController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\OpinionController;
use App\Http\Controllers\Admin\PagesContents\OurTrainingsPageContentController;
use App\Http\Controllers\Admin\PagesContents\ProfessionalProfilePageContentController;
use App\Http\Controllers\Admin\PagesContents\WelcomePageContentController;
use App\Http\Controllers\Admin\ProfessionalProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TrainingController;

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

Route::resource('contact_information', ContactInformationController::class);

Route::get('/currículum', [ProfessionalProfileController::class, 'index'])->name('professional_profile.index');


Route::resource('inquiries', InquiryController::class);
Route::resource('opinions', OpinionController::class);


//Contenidos de las páginas
Route::resource('welcome_page_content', WelcomePageContentController::class);
Route::resource('our_trainings_page_content', OurTrainingsPageContentController::class)->names('our_trainings_page_content');
Route::resource('curriculum_page_content', ProfessionalProfilePageContentController::class)->names('curriculum_page_content');
Route::resource('contact_us_page_content', ContactUsPageContentController::class);


