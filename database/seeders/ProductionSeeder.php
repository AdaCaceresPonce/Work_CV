<?php

namespace Database\Seeders;

use App\Models\PersonalData\Production;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productions = [

            [
                'title' => 'Análisis de las competencias investigativas en la formación profesional docente',
                'url' => 'https://jrtdd.com/index.php/journal/article/view/1776',
                'publication_date' => '2023-08-29',
                'abstract' => null,
                'journal_name' => 'Journal for ReAttach Therapy and Developmental Diversities'
            ],

        ];

        foreach ($productions as $production) {

            Production::create($production);

        }
    }
}
