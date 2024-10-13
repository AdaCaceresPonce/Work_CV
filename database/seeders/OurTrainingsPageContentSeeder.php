<?php

namespace Database\Seeders;

use App\Models\PagesContents\OurTrainingsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\File;

use Faker\Factory as Faker;

class OurTrainingsPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ruta de las imágenes originales en public/web_images
        $sourcePath = public_path('web_images/web_pages_images/our_trainings_page/'); // Ruta completa en public

        // Ruta de destino en storage/app/public/web_pages_images/our_trainings_page
        $destinationPath = storage_path('app/public/web_pages_images/our_trainings_page/');

        // Lista de imágenes que quieres copiar desde public a storage
        $imagesToCopy = [
            'cover_img.jpg',
            'our_trainings_img.jpg',
        ];

        $imagesInDatabase = [];

        // Copiar las imágenes o generar nuevas si no existen
        foreach ($imagesToCopy as $image) {

            $sourceImagePath = $sourcePath . $image;
            $destinationImagePath = $destinationPath . $image;

            if (File::exists($sourceImagePath)) {
                // Si la imagen existe en public, copiarla a storage
                File::copy($sourceImagePath, $destinationImagePath);
                $imagesInDatabase[$image] = 'web_pages_images/our_trainings_page/' . $image; // Guardar la ruta en storage
            } else {
                // Si la imagen no existe, generar una con Faker y guardarla en storage
                $generatedImage = $faker->image($destinationPath, 1200, 800, null, false); // Generar imagen
                $imagesInDatabase[$image] = 'web_pages_images/our_trainings_page/' . $generatedImage; // Guardar la ruta de la imagen generada
            }
        }
        
        $content = [
            
            'cover_title' => 'Nuestras Capacitaciones',
            'cover_img' => $imagesInDatabase['cover_img.jpg'],
    
            'our_trainings_title' => '<p><strong><span style="color: rgb(104, 159, 56);">Capacitaciones Profesionales</span></strong></p>',
            'our_trainings_description'=>'<p>Hoy en día los docentes requieren desarrollar competencias profesionales de acuerdo a los lineamientos educativos vigentes, Las capacitaciones que ofrecemos están estructuradas en base a metodologías activas, con ejemplos prácticos, que buscan mejorar el desempeño docente. Estamos aquí para guiarlos en un viaje de aprendizaje y desarrollo profesional, ofreciendo un entorno de apoyo estratégico con el objetivo de fomentar el crecimiento continuo y la excelencia en el proceso enseñanza aprendizaje.</p>',
            'our_trainings_img' => $imagesInDatabase['our_trainings_img.jpg'],
            
            'trainings_we_offer_title'=>'<p><strong><span style="color: rgb(104, 159, 56);">Conoce las capacitaciones que están a tu disposición</span></strong></p>',

        ];

        OurTrainingsPageContent::create($content);
    }
}
