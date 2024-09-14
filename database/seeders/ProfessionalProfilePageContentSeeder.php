<?php

namespace Database\Seeders;

use App\Models\PagesContents\ProfessionalProfilePageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ProfessionalProfilePageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $content = [
            
            'cover_title' => 'Mi currículum',
            'cover_img' => 'web_pages_images/professional_profile_page/' . $faker->image('public/storage/web_pages_images/professional_profile_page', 1200, 800, null, false),
    
            'employment_history_title' => '<p><strong><span class="text-primary">Historial Laboral</span></strong></p>',
            'employment_history_img' => 'web_pages_images/professional_profile_page/' . $faker->image('public/storage/web_pages_images/professional_profile_page', 1200, 800, null, false),
            
            'academic_backgrounds_title'=>'<p><strong><span class="text-primary">Formación Académica</span></strong></p>',

            'my_skills_title'=>'Mis Aptitudes',
            'my_skills_img' => 'web_pages_images/professional_profile_page/' . $faker->image('public/storage/web_pages_images/professional_profile_page', 1200, 800, null, false),

        ];

        ProfessionalProfilePageContent::create($content);
    }
}
