<?php

namespace Database\Seeders;

use App\Models\PagesContents\ProfessionalProfilePageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\File;

use Faker\Factory as Faker;

class ProfessionalProfilePageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ruta de las imágenes originales en public/web_images
        $sourcePath = public_path('web_images/web_pages_images/professional_profile_page/'); // Ruta completa en public

        // Ruta de destino en storage/app/public/web_pages_images/professional_profile_page
        $destinationPath = storage_path('app/public/web_pages_images/professional_profile_page/');

        // Lista de imágenes que quieres copiar desde public a storage
        $imagesToCopy = [
            'cover_img.jpg',
            'employment_history_img.jpg',
            'my_skills_img.png',
        ];

        $imagesInDatabase = [];

        // Copiar las imágenes o generar nuevas si no existen
        foreach ($imagesToCopy as $image) {

            $sourceImagePath = $sourcePath . $image;
            $destinationImagePath = $destinationPath . $image;

            if (File::exists($sourceImagePath)) {
                // Si la imagen existe en public, copiarla a storage
                File::copy($sourceImagePath, $destinationImagePath);
                $imagesInDatabase[$image] = 'web_pages_images/professional_profile_page/' . $image; // Guardar la ruta en storage
            } else {
                // Si la imagen no existe, generar una con Faker y guardarla en storage
                $generatedImage = $faker->image($destinationPath, 1200, 800, null, false); // Generar imagen
                $imagesInDatabase[$image] = 'web_pages_images/professional_profile_page/' . $generatedImage; // Guardar la ruta de la imagen generada
            }
        }

        $content = [

            'cover_title' => 'Mi currículum',
            'cover_img' => $imagesInDatabase['cover_img.jpg'],

            'employment_history_title' => '<p><strong><span class="text-primary">Historial Laboral</span></strong></p>',
            'employment_history_img' => $imagesInDatabase['employment_history_img.jpg'],

            'academic_backgrounds_title' => '<p><strong><span class="text-primary">Formación Académica</span></strong></p>',

            'my_skills_title' => 'Mis Aptitudes',
            'my_skills_img' => $imagesInDatabase['my_skills_img.png'],

            'my_productions_title' => '<p><strong><span class="text-primary">Mis Producciones</span></strong></p>',

        ];

        ProfessionalProfilePageContent::create($content);
    }
}
