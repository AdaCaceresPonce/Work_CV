<?php

namespace App\Http\Controllers\Admin\PagesContents;

use App\Http\Controllers\Controller;
use App\Models\PagesContents\ProfessionalProfilePageContent;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProfessionalProfilePageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = ProfessionalProfilePageContent::first();

        return view('admin.web_page_contents.professional_profile_page.index', compact('contents'));
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
    public function show(ProfessionalProfilePageContent $curriculumPageContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfessionalProfilePageContent $curriculumPageContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfessionalProfilePageContent $curriculumPageContent)
    {
        $request->validate([

            'cover_title' => 'required',
            'cover_img' => 'image|max:2048',

            'employment_history_title' => 'required',
            'employment_history_img' => 'image|max:1024',

            'academic_backgrounds_title' => 'required',

            'my_skills_title' => 'required',
            'my_skills_img' => 'image|max:1024',

            'my_productions_title' => 'required',


        ], [

            'cover_img.image' => 'El archivo para la portada debe ser una imagen.',
            'cover_img.max' => 'La imagen para la portada no debe superar los 2048 KB.',

            'employment_history_img.image' => 'El archivo debe ser una imagen en la sección de historial académico.',
            'employment_history_img.max' => 'La imagen en la sección de historial académico no debe superar los 1024 KB.',

            'my_skills_img.image' => 'El archivo debe ser una imagen en la sección sobre las aptitudes.',
            'my_skills_img.max' => 'La imagen en la sección sobre las aptitudes no debe superar los 1024 KB.',

        ], [
            'cover_title' => 'título de la portada',
            'cover_img' => 'imagen de la portada',

            'employment_history_title' => 'título en historial académico',
            'employment_history_img' => 'imagen en historial académico',

            'academic_backgrounds_title' => 'título en grados académicos',

            'my_skills_title' => 'título en las aptitudes',
            'my_skills_img' => 'imagen en las aptitudes',

            'my_skills_title' => 'título en las producciones',

        ]);

        $images = ['cover_img', 'employment_history_img', 'my_skills_img'];

        $curriculumPageContent->update($request->except($images));

        foreach ($images as $image) {

            if ($request->hasFile($image)) {

                // Eliminar la imagen antigua
                Storage::delete($curriculumPageContent->$image);

                // Almacenar la nueva imagen en la ruta indicada y actualizar el campo correspondiente en el modelo
                $curriculumPageContent->update([$image => $request->file($image)->store('web_pages_images/professional_profile_page')]);
            }
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Información actualizada correctamente'
        ]);

        return redirect()->route('admin.curriculum_page_content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfessionalProfilePageContent $curriculumPageContent)
    {
        //
    }
}
