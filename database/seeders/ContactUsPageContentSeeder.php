<?php

namespace Database\Seeders;

use App\Models\PagesContents\ContactUsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use Illuminate\Support\Facades\File;

class ContactUsPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ruta de las imágenes originales en public/web_images
        $sourcePath = public_path('web_images/web_pages_images/contact_us_page/'); // Ruta completa en public

        // Ruta de destino en storage/app/public/web_pages_images/contact_us_page
        $destinationPath = storage_path('app/public/web_pages_images/contact_us_page/');

        // Lista de imágenes que quieres copiar desde public a storage
        $imagesToCopy = [
            'cover_img.jpg',
            'contact_us_img.jpg',
        ];

        $imagesInDatabase = [];

        // Copiar las imágenes o generar nuevas si no existen
        foreach ($imagesToCopy as $image) {

            $sourceImagePath = $sourcePath . $image;
            $destinationImagePath = $destinationPath . $image;

            if (File::exists($sourceImagePath)) {
                // Si la imagen existe en public, copiarla a storage
                File::copy($sourceImagePath, $destinationImagePath);
                $imagesInDatabase[$image] = 'web_pages_images/contact_us_page/' . $image; // Guardar la ruta en storage
            } else {
                // Si la imagen no existe, generar una con Faker y guardarla en storage
                $generatedImage = $faker->image($destinationPath, 1200, 800, null, false); // Generar imagen
                $imagesInDatabase[$image] = 'web_pages_images/contact_us_page/' . $generatedImage; // Guardar la ruta de la imagen generada
            }
        }

        $content = [
            
            'cover_title' => 'Contáctanos',
            'cover_img' => $imagesInDatabase['cover_img.jpg'],
    
            'contact_us_title' => '<p><strong>Comunícate conmigo, estoy a tu servicio</strong></p>',
            'contact_us_description' => '<p><strong><span class="text-primary">Envía una consulta. Me pondré en contacto contigo lo más antes posible.</span></strong></p>',
            'contact_us_img'=> $imagesInDatabase['contact_us_img.jpg'],

            'opinions_title' => '<p><strong>¡Comparte tu opinión con nosotros!</strong></p>',
            'opinions_description' => '<p><strong><span class="text-primary">Tu opinión es muy importante. Queremos saber cómo ha sido tu experiencia con nuestros servicios para poder ofrecerte la mejor atención.</span></strong></p>',
            'opinions_img'=> 'web_pages_images/contact_us_page/' . $faker->image('public/storage/web_pages_images/contact_us_page', 1200, 800, null, false),
            
        ];

        ContactUsPageContent::create($content);
    }
}
