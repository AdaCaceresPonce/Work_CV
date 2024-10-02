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

        // Verifica si hay un número de WhatsApp y elimina el signo '+'
        $whatsappNumber = $contact_information->whatsapp_number ? ltrim($contact_information->whatsapp_number, '+') : null;
        $whatsappMessage = $contact_information->whatsapp_message;

        return view('layouts.app', compact('contact_information', 'whatsappNumber', 'whatsappMessage'));
    }
}
