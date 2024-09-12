<?php

namespace App\Http\Controllers\Admin\PagesContents;

use App\Http\Controllers\Controller;
use App\Models\PagesContents\WelcomePageContent;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class WelcomePageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = WelcomePageContent::first();

        return view('admin.web_page_contents.welcome_page.index', compact('contents'));
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
    public function show(WelcomePageContent $welcomePageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WelcomePageContent $welcomePageContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WelcomePageContent $welcomePageContent)
    {
        $request->validate([

            'cover_title' => 'required',
            'cover_description' => 'required',
            'cover_img' => 'image|max:2048',

            'about_description' => 'required',

            'our_trainings_title' => 'required',
            'our_trainings_description' => 'required',

            'why_choose_our_trainings_title' => 'required',
            'why_choose_our_trainings_description' => 'required',
            'why_choose_our_trainings_img' => 'image|max:1024',

            'testimonials_title' => 'required',
            'testimonials_description' => 'required',

        ], [

            'cover_img.image' => 'El archivo para la portada debe ser una imagen.',
            'cover_img.max' => 'La imagen para la portada no debe superar los 2048 KB.',

            'why_choose_our_trainings_img.image' => 'El archivo debe ser una imagen en la sección sobre por qué elegir las capacitaciones.',
            'why_choose_our_trainings_img.max' => 'La imagen sobre por qué elegir las capacitaciones no debe superar los 1024 KB.',

        ], [
            'cover_title' => 'título de la portada',
            'cover_description' => 'descripción de la portada',
            'cover_img' => 'imagen de la portada',

            'about_description' => 'descripción sobre el propósito de la página',

            'our_trainings_title' => 'título del listado de capacitaciones',
            'our_trainings_description' => 'descripción del listado de capacitaciones',

            'why_choose_our_trainings_title' => 'título sobre por qué elegir las capacitaciones',
            'why_choose_our_trainings_description' => 'descripción sobre por qué elegir las capacitaciones',
            'why_choose_our_trainings_img' => 'imagen sobre por qué elegir las capacitaciones',

            'testimonials_title' => 'título de la sección opiniones',
            'testimonials_description' => 'descripción de la sección opiniones',
        ]);

        $images = ['cover_img', 'why_choose_our_trainings_img'];

        $welcomePageContent->update($request->except($images));

        foreach ($images as $image) {

            if ($request->hasFile($image)) {

                // Eliminar la imagen antigua
                Storage::delete($welcomePageContent->$image);

                // Almacenar la nueva imagen en la ruta indicada y actualizar el campo correspondiente en el modelo
                $welcomePageContent->update([$image => $request->file($image)->store('web_pages_images/welcome_page')]);
            }
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.welcome_page_content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WelcomePageContent $welcomePageContent)
    {
        //
    }
}
