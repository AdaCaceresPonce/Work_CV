<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PagesContents\OurTrainingsPageContent;
use App\Models\Training;
use Illuminate\Http\Request;

class OurTrainingsPageController extends Controller
{
    public function index(){

        // $services = Training::orderBy('id', 'desc')->paginate(6);
        $contents = OurTrainingsPageContent::first();
        // return view('web.our_trainings.our_trainings',compact('services', 'contents'));

        return view('web.our_trainings.our_trainings', compact('contents'));
        
    }

    public function show_training(Training $training){

        return view('web.our_trainings.training_details', compact('training'));
    }
}
