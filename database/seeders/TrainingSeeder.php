<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        $trainings = [

            'Planificación curricular nivel secundaria' => [
                'description' => null,
                'card_img_path' => 'images/trainings/planificacion-curricular-card.jpg',
                'cover_img_path' => 'images/trainings/planificacion-curricular-cover.jpg',
                'additional_info' => null,
                'topics' => [
                    'Perfil de Egreso de la Educación',
                    'Enfoques transversales',
                    'Planificación curricular',
                    'Necesidades de aprendizaje',
                    'Evidencias de aprendizajes',
                    'Situaciones significativas',
                    'Competencias, capacidades y desempeños',
                    'Estándares de aprendizajes'
                ]
            ],

            'Enfoque por competencias' => [
                'description' => null,
                'card_img_path' => 'images/trainings/enfoque-competencias-card.jpg',
                'cover_img_path' => 'images/trainings/enfoque-competencias-cover.jpg',
                'additional_info' => null,
                'topics' => [
                    'Conferencia Mundial: "Educación para Todos"',
                    'Cambios en la educación',
                    '¿Qué es el enfoque por competencias?',
                    'Antecedentes del enfoque por competencias',
                    'Evaluación de las Competencias'
                ]
            ],

            'Evaluación Formativa' => [
                'description' => null,
                'card_img_path' => 'images/trainings/evaluacion-formativa-card.jpg',
                'cover_img_path' => 'images/trainings/evaluacion-formativa-cover.jpg',
                'additional_info' => null,
                'topics' => [
                    'Definición de evaluación formativa',
                    'Característica de la evaluación formativa',
                    'Objetivo de la evaluación formativa',
                    'Aspectos de la evaluación formativa',
                    'Marco normativo de la evaluación formativa'
                ]
            ],

            'Evaluación diagnóstica' => [
                'description' => null,
                'card_img_path' => 'images/trainings/evaluacion-diagnostica-card.jpg',
                'cover_img_path' => 'images/trainings/evaluacion-diagnostica-cover.jpg',
                'additional_info' => null,
                'topics' => [
                    'Importancia de la evaluación diagnóstica',
                    'Normativa vigente',
                    '¿Cómo realizamos la evaluación diagnóstica?',
                    '¿Cómo analizamos la información obtenida?',
                    'Toma de decisiones'
                ]
            ],

            'Rúbricas de Observación de Aula' => [
                'description' => null,
                'card_img_path' => 'images/trainings/evaluacion-diagnostica-card.jpg',
                'cover_img_path' => 'images/trainings/evaluacion-diagnostica-cover.jpg',
                'additional_info' => null,
                'topics' => [
                    'Rúbricas de Observación de Aula',
                    '¿Cómo involucrar activamente a los estudiantes en el proceso de aprendizaje?',
                    '¿Cómo promover el razonamiento, la creatividad y/o pensamiento crítico?',
                    '¿Cómo evaluar el progreso de los aprendizajes para retroalimentar a los estudiantes y adecuar su enseñanza?',
                    '¿Cómo propiciar un ambiente de respecto y proximidad?',
                    '¿Cómo regular positivamente el comportamiento de los estudiantes?',
                ]
            ],

        ];

        foreach ($trainings as $trainingName => $trainingData) {

            // Crear el training
            $training = Training::create([
                'name' => $trainingName,
                'slug' => Str::slug($trainingName),
                'description' => $trainingData['description'],
                'card_img_path' => 'trainings/card_images/' . $faker->image('public/storage/trainings/card_images', 640, 480, null, false),
                'cover_img_path' => 'trainings/cover_images/' . $faker->image('public/storage/trainings/cover_images', 1000, 350, null, false),
                'additional_info' => $trainingData['additional_info'],
            ]);

            // Crear los topics para el training
            foreach ($trainingData['topics'] as $index => $topicName) {
                Topic::create([
                    'training_id' => $training->id,
                    'name' => $topicName,
                    'description' => null,
                    'position' => $index + 1,
                ]);
            }
        }
    }
}
