<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalData\AcademicBackground;
use App\Models\PersonalData\EmploymentHistory;
use App\Models\PersonalData\Skill;
use Illuminate\Http\Request;

class ProfessionalProfileController extends Controller
{
    public function index(){

        return view('admin.professional_profile.index');
        
    }
}
