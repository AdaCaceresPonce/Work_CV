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

            'about_title' => '<p><strong>Una Cl&iacute;nica Dental en la que puedes <span style="color: rgb(0, 117, 255);">confiar.</span></strong></p>',
            'about_description'=>'<p>En mi página personal, se ofrece capacitaciones de alta calidad en el campo educativo. Mi misión es promover el logro de los aprendizajes en las y los estudiantes de las IE peruanas, motivando a los docentes a desarrollar estrategias innovadoras de enseñanza aprendizaje. Aquí encontrarás información sobre las capacitaciones.</p>',
            'about_we_offer_you' => 'Equipamiento moderno, Monitoreo continuo, Equipo de Profesionales capacitado',
            'about_image' => 'web_pages_images/welcome_page/' . $faker->image('public/storage/web_pages_images/welcome_page', 1200, 800, null, false),

            'our_services_title'=>'<p><strong><span style="color: rgb(0, 117, 255);">Nuestros Servicios Dentales</span></strong></p>',
            'our_services_description'=>'<p>Descubre los servicios que ponemos a tu disposici&oacute;n, siempre con la mejor atenci&oacute;n m&eacute;dica dental.</p>',

            'our_professionals_title'=>'<p><span style="color: rgb(0, 117, 255);"><strong>Nuestros Profesionales</strong></span></p>',
            'our_professionals_description'=>'<p>Disponemos de un equipo de profesionales altamente capacitados.</p>',

            'testimonials_title'=>'<p><span style="color: rgb(0, 117, 255);"><strong>Lo que nuestros pacientes opinan</strong></span></p>',
            'testimonials_description'=>'<p>Pacientes de diferentes lugares nos dejan sus opiniones.</p>',
            
        ];

        WelcomePageContent::create($content);
    }
}
