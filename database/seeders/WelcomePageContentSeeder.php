<?php

namespace Database\Seeders;

use App\Models\PagesContents\WelcomePageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class WelcomePageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $content = [
            
            'cover_title' => '<p><strong><span class="text-primary">Mgtr. Patricia Cárdenas</span></strong></p>',
            'cover_description' => '<p>Educadora con una basta experiencia, conocedora de los actuales lineamientos educativos, compartirá sus conocimientos, habilidades y experiencias con la comunidad educativa a través de capacitaciones retadoras, innovadoras e inspiradoras.</p>',
            'cover_img' => 'web_pages_images/welcome_page/' . $faker->image('public/storage/web_pages_images/welcome_page', 2923, 1948, null, false),

            'about_description'=>'<p>En mi página personal, se ofrece capacitaciones de alta calidad en el campo educativo. Mi misión es promover el logro de los aprendizajes en las y los estudiantes de las IE peruanas, motivando a los docentes a desarrollar estrategias innovadoras de enseñanza aprendizaje. Aquí encontrarás información sobre las capacitaciones.</p>',
            
            'our_trainings_title'=>'<p><strong><span class="text-primary">Conoce nuestras capacitaciones</span></strong></p>',
            'our_trainings_description'=>'<p>Descubre las capacitaciones que están a tu disposición.</p>',

            'why_choose_our_trainings_title'=>'<p><strong><span class="text-primary">¿Por qué elegir nuestras capacitaciones?</span></strong></p>',
            'why_choose_our_trainings_description'=>'<ul class="list-disc">
                <li><strong>Experiencia comprobada:</strong> Con años de experiencia en el campo educativo, he perfeccionado un enfoque de enseñanza que maximiza el aprendizaje y la aplicación práctica.</li>
                <li><strong>Capacitaciones personalizadas:</strong> Cada capacitación esta diseñada para adaptarse a las necesidades y objetivos de las instituciones educativas, garantizando que se obtenga el máximo beneficio en cada sesión.</li>
                <li><strong>Metodologías innovadoras:</strong> Uso de metodologías activas para asegurar el propósito de las capacitaciones. Desarrollo de talleres educativos.</li>
            </ul>',
            'why_choose_our_trainings_img' => 'web_pages_images/welcome_page/' . $faker->image('public/storage/web_pages_images/welcome_page', 1200, 800, null, false),
            
            'testimonials_title'=>'<p><span class="text-primary"><strong>Lo que nuestros instruidos opinan</strong></span></p>',
            'testimonials_description'=>'<p>Escucha lo que nuestros alumnos dicen sobre sus experiencias en nuestras capacitaciones.</p>',
            
        ];

        WelcomePageContent::create($content);
    }
}
