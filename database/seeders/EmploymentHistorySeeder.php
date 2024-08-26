<?php

namespace Database\Seeders;

use App\Models\PersonalData\EmploymentHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploymentHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Se define el historial laboral
        $employment_histories = [

            'Sub directora en instituciones educativas con amplia trayectoria.' => [
                'description' => null,
            ],

            'Coordinadora de proyecto de innovación.' => [
                'description' => null,
            ],

            'Docente del nivel secundaria, especialidad de matemática.' => [
                'description' => null,
            ],

        ];

        // Crear los registros de historial laboral
        $position = 1; // Inicializar el contador de posición
        foreach ($employment_histories as $employment_name => $data) {

            EmploymentHistory::create([
                'job_title' => $employment_name, // Usar el string como título del trabajo
                'description' => $data['description'],
                'position' => $position, // Asignar la posición actual
            ]);

            $position++; // Incrementar la posición
        }
    }
}
