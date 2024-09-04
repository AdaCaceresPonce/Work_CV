<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.trainings.index');
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
        return ('Hola');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {

        return view('admin.trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        $request['slug'] = Str::slug($request->input('name'));

        $request->validate([
            'name' => 'required',
            'slug' => 'unique:trainings,slug,' . $training->id,
            'description' => 'nullable',
            'card_img_path' => 'image|max:2048',
            'cover_img_path' => 'image|max:1024',
        ], [], [
            'name' => 'nombre',
            'slug' => 'slug',
            'description' => 'descripción',
            'card_img_path' => 'imagen para la carta',
            'cover_img_path' => 'imagen de portada',
        ]);


        $training->update($request->except(['card_img_path', 'cover_img_path']));

        $images = [

            [
                'name' => 'card_img_path',
                'path' => 'trainings/card_images'
            ],

            [
                'name' => 'cover_img_path',
                'path' => 'trainings/cover_images'
            ],

        ];

        foreach ($images as $image) {

            if ($request->hasFile($image['name'])) {

                // Eliminar la imagen antigua
                Storage::delete($training->{$image['name']});

                // Almacenar la nueva imagen y actualizar el campo correspondiente en el modelo
                $newImagePath = $request->file($image['name'])->store($image['path']);
                $training->update([$image['name'] => $newImagePath]);
            }
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'Capacitación actualizada correctamente'
        ]);

        return redirect()->route('admin.trainings.edit', compact('training'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        Storage::delete($training->card_img_path);
        Storage::delete($training->cover_img_path);

        $training->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Realizado!',
            'text' => 'Capacitación eliminada correctamente.'
        ]);

        return redirect()->route('admin.trainings.index');
    }
}
