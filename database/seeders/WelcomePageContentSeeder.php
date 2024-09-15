<?php

namespace Database\Seeders;

use App\Models\PagesContents\WelcomePageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\File;

use Faker\Factory as Faker;

class WelcomePageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

         // Ruta de las imágenes originales en public/web_pages
         $sourcePath = public_path('web_images/web_pages_images/welcome_page/'); // Ruta completa en public

         // Ruta de destino en storage/app/public/web_pages_images/welcome_page
         $destinationPath = storage_path('app/public/web_pages_images/welcome_page/');

         // Lista de imágenes que quieres copiar desde public a storage
        $imagesToCopy = [
            'cover_img.jpg',
            'why_choose_our_trainings_img.jpg',
        ];

        $imagesInDatabase = [];

        // Copiar las imágenes o generar nuevas si no existen
        foreach ($imagesToCopy as $image) {

            $sourceImagePath = $sourcePath . $image;
            $destinationImagePath = $destinationPath . $image;

            if (File::exists($sourceImagePath)) {
                // Si la imagen existe en public, copiarla a storage
                File::copy($sourceImagePath, $destinationImagePath);
                $imagesInDatabase[$image] = 'web_pages_images/welcome_page/' . $image; // Guardar la ruta en storage
            } else {
                // Si la imagen no existe, generar una con Faker y guardarla en storage
                $generatedImage = $faker->image($destinationPath, 1200, 800, null, false); // Generar imagen
                $imagesInDatabase[$image] = 'web_pages_images/welcome_page/' . $generatedImage; // Guardar la ruta de la imagen generada
            }
        }

        $content = [
            
            'cover_title' => '<p><strong><span class="text-primary">Mgtr. Patricia Cárdenas</span></strong></p>',
            'cover_description' => '<p>Educadora con una basta experiencia, conocedora de los actuales lineamientos educativos, compartirá sus conocimientos, habilidades y experiencias con la comunidad educativa a través de capacitaciones retadoras, innovadoras e inspiradoras.</p>',
            'cover_img' => $imagesInDatabase['cover_img.jpg'],

            'about_description'=>'<p>En mi página personal, se ofrece capacitaciones de alta calidad en el campo educativo. Mi misión es promover el logro de los aprendizajes en las y los estudiantes de las IE peruanas, motivando a los docentes a desarrollar estrategias innovadoras de enseñanza aprendizaje. Aquí encontrarás información sobre las capacitaciones.</p>',
            
            'our_trainings_title'=>'<p><strong><span class="text-primary">Conoce nuestras capacitaciones</span></strong></p>',
            'our_trainings_description'=>'<p>Descubre las capacitaciones que están a tu disposición.</p>',

            'why_choose_our_trainings_title'=>'<p><strong><span class="text-primary">¿Por qué elegir nuestras capacitaciones?</span></strong></p>',
            'why_choose_our_trainings_description'=>'<ol>
<li><strong>Experiencia comprobada:</strong> Con a&ntilde;os de experiencia en el campo educativo, he perfeccionado un enfoque de ense&ntilde;anza que maximiza el aprendizaje y la aplicaci&oacute;n pr&aacute;ctica.</li>
<li><strong>Capacitaciones personalizadas:</strong> Cada capacitaci&oacute;n esta dise&ntilde;ada para adaptarse a las necesidades y objetivos de las instituciones educativas, garantizando que se obtenga el m&aacute;ximo beneficio en cada sesi&oacute;n.</li>
<li><strong>Metodolog&iacute;as innovadoras:</strong> Uso de metodolog&iacute;as activas para asegurar el prop&oacute;sito de las capacitaciones. Desarrollo de talleres educativos.</li>
</ol>',
            'why_choose_our_trainings_img' => $imagesInDatabase['why_choose_our_trainings_img.jpg'],
            
            'testimonials_title'=>'<p><span class="text-primary"><strong>Lo que nuestros instruidos opinan</strong></span></p>',
            'testimonials_description'=>'<p>Escucha lo que nuestros alumnos dicen sobre sus experiencias en nuestras capacitaciones.</p>',
            
        ];

        WelcomePageContent::create($content);
    }
}
