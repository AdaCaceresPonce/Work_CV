<?php

namespace Database\Seeders;

use App\Models\PersonalData\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            'Planificación y organización del trabajo educativo',
            'Trabajo en equipo',
            'Capacidad de Liderazgo',
            'Habilidades comunicativas'
        ];

        $position = 1; // Inicializar el contador de posición

        foreach ($skills as $skill) {

            Skill::create([
                'name' => $skill,
                'position' => $position, // Asignar la posición actual
            ]);

            $position++; // Incrementar la posición
            
        }
    }
}
