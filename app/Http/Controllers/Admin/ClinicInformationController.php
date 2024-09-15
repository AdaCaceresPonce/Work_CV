<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicInformation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ClinicInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinic_information = ClinicInformation::first();
        return view('admin.clinic_information.index', compact('clinic_information'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClinicInformation $clinicInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClinicInformation $clinicInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClinicInformation $clinicInformation)
    {
        // Validación de los datos del formulario
        $request->validate([
            'phone' => 'nullable|string|max:255',
            'cellphone' => 'required|string|max:255',
            'schedule' => 'required|string|max:500',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'navbar_clinic_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'footer_clinic_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ],[],[
            'phone' => 'número de teléfono',
            'cellphone' => 'número de celular',
            'schedule' => 'horario',
            'email' => 'correo electrónico',
            'address' => 'dirección',
            'facebook_link' => 'enlace de facebook',
            'twitter_link' => 'enlace de twitter',
            'instagram_link' => 'enlace de instagram',
            'navbar_clinic_logo' => 'logo para el navbar',
            'footer_clinic_logo' => 'logo para el footer',
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.clinic_information.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClinicInformation $clinicInformation)
    {
        //
    }
}
