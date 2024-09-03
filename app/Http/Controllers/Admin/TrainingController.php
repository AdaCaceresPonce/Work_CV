<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return('Hola');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        
    }

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
            'slug' => 'unique:trainings,slug,'. $training->id,
            'small_description' => 'required',
            'long_description' => 'required',
            'card_img_path' => 'image|max:2048',
            'cover_img_path' => 'image|max:1024',
        ],[],[
            'name' => 'nombre',
            'slug' => 'slug',
            'small_description' => 'descripción para la carta',
            'long_description' => 'descripción general del servicio',
            'card_img_path' => 'imagen para la carta',
            'cover_img_path' => 'imagen de portada',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        //
    }
}
