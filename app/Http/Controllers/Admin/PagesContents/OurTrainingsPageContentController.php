<?php

namespace App\Http\Controllers\Admin\PagesContents;

use App\Http\Controllers\Controller;
use App\Models\PagesContents\OurTrainingsPageContent;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class OurTrainingsPageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = OurTrainingsPageContent::first();

        return view('admin.web_page_contents.our_trainings_page.index', compact('contents'));
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
    public function show(OurTrainingsPageContent $ourTrainingsPageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurTrainingsPageContent $ourTrainingsPageContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurTrainingsPageContent $ourTrainingsPageContent)
    {
        $request->validate([

            'cover_title' => 'required',
            'cover_img' => 'image|max:2048',

            'our_trainings_title' => 'required',
            'our_trainings_description' => 'required',
            'our_trainings_img' => 'image|max:1024',

            'trainings_we_offer_title' => 'required',

        ], [

            'cover_img.image' => 'El archivo para la portada debe ser una imagen.',
            'cover_img.max' => 'La imagen para la portada no debe superar los 2048 KB.',

            'our_trainings_img.image' => 'El archivo debe ser una imagen en la sección sobre las capacitaciones profesionales.',
            'our_trainings_img.max' => 'La imagen sobre las capacitaciones profesionales no debe superar los 1024 KB.',

        ], [

            'cover_title' => 'título de la portada',
            'cover_img' => 'imagen de la portada',

            'our_trainings_title' => 'título sobre las capacitaciones profesionales',
            'our_trainings_description' => 'descripción sobre las capacitaciones profesionales',
            'our_trainings_img' => 'imagen sobre las capacitaciones profesionales',

            'trainings_we_offer_title' => 'título sobre las capacitaciones que se ofrecen',

        ]);

        $images = ['cover_img', 'our_trainings_img'];

        $ourTrainingsPageContent->update($request->except($images));

        foreach ($images as $image) {

            if ($request->hasFile($image)) {

                // Eliminar la imagen antigua
                Storage::delete($ourTrainingsPageContent->$image);

                // Almacenar la nueva imagen en la ruta indicada y actualizar el campo correspondiente en el modelo
                $ourTrainingsPageContent->update([$image => $request->file($image)->store('web_pages_images/our_trainings_page')]);
            }
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.our_trainings_page_content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurTrainingsPageContent $ourTrainingsPageContent)
    {
        //
    }
}
