<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use Illuminate\Http\Request;

class ContactInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_information = ContactInformation::first();
        return view('admin.contact_information.index', compact('contact_information'));
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
    public function show(ContactInformation $contactInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactInformation $contactInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactInformation $contactInformation)
    {
        // Validación de los datos del formulario
        $request->validate([
            'phone' => 'nullable|string|max:255',
            'cellphone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
        ],[],[
            'phone' => 'número de teléfono',
            'cellphone' => 'número de celular',
            'email' => 'correo electrónico',
            'facebook_link' => 'enlace de facebook',
            'twitter_link' => 'enlace de twitter',
            'instagram_link' => 'enlace de instagram',
        ]);

        $contactInformation->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.contact_information.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactInformation $contactInformation)
    {
        //
    }
}
