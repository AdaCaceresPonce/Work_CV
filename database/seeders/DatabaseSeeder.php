<?php

namespace Database\Seeders;

use App\Models\Inquiry;
use App\Models\Opinion;
use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        //Eliminar carpetas
        Storage::deleteDirectory('trainings/card_images');
        Storage::deleteDirectory('trainings/cover_images');

        Storage::deleteDirectory('web_pages_images/welcome_page');
        Storage::deleteDirectory('web_pages_images/our_trainings_page');
        Storage::deleteDirectory('web_pages_images/professional_profile_page');
        Storage::deleteDirectory('web_pages_images/contact_us_page');

        //Crear carpetas
        Storage::makeDirectory('trainings/card_images');
        Storage::makeDirectory('trainings/cover_images');

        Storage::makeDirectory('web_pages_images/welcome_page');
        Storage::makeDirectory('web_pages_images/our_trainings_page');
        Storage::makeDirectory('web_pages_images/professional_profile_page');
        Storage::makeDirectory('web_pages_images/contact_us_page');

        //Capacitaciones
        $this->call(TrainingSeeder::class);

        //Sobre el Currículum
            //Historial Laboral
            $this->call(EmploymentHistorySeeder::class);
            //Formación académica
            $this->call(AcademicBackgroundSeeder::class);
            //Aptitudes
            $this->call(SkillSeeder::class);
            //Producciones
            $this->call(ProductionSeeder::class);

        //Información de contacto
        $this->call(ContactInformationSeeder::class);

        //Contenidos de páginas
            $this->call(WelcomePageContentSeeder::class);
            $this->call(OurTrainingsPageContentSeeder::class);
            $this->call(ProfessionalProfilePageContentSeeder::class);
            $this->call(ContactUsPageContentSeeder::class);

        //Factories
            //Consultas
            Inquiry::factory(30)->create();
            //Opiniones
            Opinion::factory(30)->create();

    }
}
