<?php

namespace App\View\Components;

use App\Models\ClinicInformation;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $clinicInformation = ClinicInformation::first();

        return view('layouts.app', compact('clinicInformation'));
    }
}
