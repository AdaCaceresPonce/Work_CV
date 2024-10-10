<?php

namespace App\Http\Controllers\Admin\PagesContents;

use App\Http\Controllers\Controller;
use App\Models\PagesContents\ContactUsPageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ContactUsPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = ContactUsPageContent::first();

        return view('admin.web_page_contents.contact_us_page.index', compact('contents'));
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
    public function show(ContactUsPageContent $contactUsPageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUsPageContent $contactUsPageContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactUsPageContent $contactUsPageContent)
    {
        $request->validate([
            'cover_title' => 'required',
            'cover_img' => 'image|max:1024',

            'contact_us_title' => 'required',
            'contact_us_description' => 'required',
            'contact_us_img' => 'image|max:1024',

            'opinions_title' => 'nullable',
            'opinions_description' => 'nullable',
            'opinions_img' => 'nullable|image|max:1024',

        ], [] , [

            'cover_title' => 'título de la portada',
            'cover_img' => 'imagen de la portada',

            'contact_us_title' => 'título de la sección de contacto',
            'contact_us_description' => 'descripción de la sección de contacto',
            'contact_us_img' => 'imagen de la sección de contacto',

            'opinions_title' => 'título de la sección de opiniones',
            'opinions_description' => 'descripción de la sección de opiniones',

        ]);

        $images = ['cover_img', 'contact_us_img' ];

        $contactUsPageContent->update($request->except($images));

        foreach ($images as $image) {
            
            if ($request->hasFile($image)) {

                // Eliminar la imagen antigua
                Storage::delete($contactUsPageContent->$image);
        
                // Almacenar la nueva imagen y actualizar el campo correspondiente en el modelo
                $contactUsPageContent->update([$image => $request->file($image)->store('web_pages_images/contact_us_page')]);
            }
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.contact_us_page_content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUsPageContent $contactUsPageContent)
    {
        //
    }
}
