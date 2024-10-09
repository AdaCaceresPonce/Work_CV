<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PagesContents\ProfessionalProfilePageContent;
use App\Models\PersonalData\AcademicBackground;
use App\Models\PersonalData\EmploymentHistory;
use App\Models\PersonalData\Production;
use App\Models\PersonalData\Skill;
use Illuminate\Http\Request;

class ProfessionalProfilePageController extends Controller
{
    public function index(){

        $contents = ProfessionalProfilePageContent::first();

        $employment_history = EmploymentHistory::orderBy('position', 'asc')->get();

        $academic_backgrounds = AcademicBackground::orderBy('position', 'asc')->get();

        $skills = Skill::orderBy('position', 'asc')->get();

        $productions = Production::all();

        return view('web.professional_profile', compact('contents', 'employment_history', 'academic_backgrounds', 'skills', 'productions'));
        
    }
}
