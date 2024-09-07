<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactUsPageContent;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index($training = null)
    {
        $contents = ContactUsPageContent::first();

        return view('web.contact_us', compact('contents', 'training'));
    }
}
