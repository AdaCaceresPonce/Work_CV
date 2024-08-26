<?php

namespace Database\Seeders;

use App\Models\PersonalData\AcademicBackground;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Se definen los grados académicos para la tabla de formación académica
        $academic_backgrounds = [

            'Magíster en Psicología Educativa' => [
                'institution' => 'Universidad César Vallejo / Trujillo',
            ],

            'Segunda Especialidad: Gestión Escolar con Liderazgo Pedagógico' => [
                'institution' => 'Universidad San Ignacio de Loyola / Lima',
            ],

            'Bachiller en Educación' => [
                'institution' => 'Universidad Mayor de San Marcos / Lima',
            ],

            'Profesora de Educación Secundaria de Matemática' => [
                'institution' => 'Instituto Superior Pedagógico de Chincha',
            ],

        ];

        // Crear los registros de grados académicos
        $position = 1; // Inicializar el contador de posición
        foreach ($academic_backgrounds as $degree_name => $data) {

            AcademicBackground::create([
                'degree_name' => $degree_name,
                'institution' => $data['institution'],
                'position' => $position,
            ]);

            $position++; // Incrementar la posición

        }

    }
}
