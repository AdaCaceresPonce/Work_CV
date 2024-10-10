<?php

namespace App\Http\Controllers;

use App\Models\PagesContents\WelcomePageContent;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        
        $contents = WelcomePageContent::first();
        
        return view('welcome', compact('contents'));
    }
}
