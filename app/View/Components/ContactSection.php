<?php

namespace App\View\Components;

use App\Models\ContactInformation;
use App\Models\PagesContents\ContactUsPageContent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $contact_information = ContactInformation::first();

        $contact_section = ContactUsPageContent::first();

        return view('layouts.partials.app.contact-section', compact('contact_information', 'contact_section'));
    }
}
