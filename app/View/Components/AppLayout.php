<?php

namespace App\View\Components;

use App\Models\ContactInformation;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $contact_information = ContactInformation::first();

        return view('layouts.app', compact('contact_information'));
    }
}
