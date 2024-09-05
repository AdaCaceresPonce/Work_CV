<?php

namespace Database\Seeders;

use App\Models\PagesContents\OurTrainingsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class OurTrainingsPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $content = [
            
            'cover_title' => 'Nuestras Capacitaciones',
            'cover_img' => 'web_pages_images/our_trainings_page/' . $faker->image('public/storage/web_pages_images/our_trainings_page', 1200, 800, null, false),
    
            'our_trainings_title' => '<p><strong><span class="text-primary">Capacitaciones Profesionales</span></strong></p>',
            'our_trainings_description'=>'<p>Hoy en día los docentes requieren desarrollar competencias profesionales de acuerdo a los lineamientos educativos vigentes, Las capacitaciones que ofrecemos están estructuradas en base a metodologías activas, con ejemplos prácticos, que buscan mejorar el desempeño docente. Estamos aquí para guiarlos en un viaje de aprendizaje y desarrollo profesional, ofreciendo un entorno de apoyo estratégico con el objetivo de fomentar el crecimiento continuo y la excelencia en el proceso enseñanza aprendizaje.</p>',
            'our_trainings_img' => 'web_pages_images/our_trainings_page/' . $faker->image('public/storage/web_pages_images/our_trainings_page', 1200, 800, null, false),
            
            'trainings_we_offer_title'=>'<p><strong><span class="text-primary">Conoce las capacitaciones que están a tu disposición</span></strong></p>',

        ];

        OurTrainingsPageContent::create($content);
    }
}
