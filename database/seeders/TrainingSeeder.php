<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

use Illuminate\Support\Facades\File;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        // Rutas de las imágenes originales en public y destino en storage
        $sourceCardPath = public_path('web_images/trainings/card_images/');
        $sourceCoverPath = public_path('web_images/trainings/cover_images/');

        $cardImagesDestinationPath = storage_path('app/public/trainings/card_images/');
        $coverImagesDestinationPath = storage_path('app/public/trainings/cover_images/');


        $trainings = [

            'Planificación curricular nivel secundaria' => [
                'description' => null,
                'card_img_path' => 'planificacion_curricular_card.jpg',
                'cover_img_path' => 'planificacion_curricular_cover.jpg',
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
                'card_img_path' => 'enfoque_competencias_card.jpg',
                'cover_img_path' => 'enfoque_competencias_cover.jpg',
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
                'card_img_path' => 'evaluacion_formativa_card.jpg',
                'cover_img_path' => 'evaluacion_formativa_cover.jpg',
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
                'card_img_path' => 'evaluacion_diagnostica_card.jpg',
                'cover_img_path' => 'evaluacion_diagnostica_cover.jpg',
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
                'card_img_path' => 'rubricas_observacion_card.jpg',
                'cover_img_path' => 'rubricas_observacion_cover.jpg',
                'additional_info' => null,
                'topics' => [
                    'Rúbricas de Observación de Aula',
                    '¿Cómo involucrar activamente a los estudiantes en el proceso de aprendizaje?',
                    '¿Cómo promover el razonamiento, la creatividad y/o pensamiento crítico?',
                    '¿Cómo evaluar el progreso de los aprendizajes para retroalimentar a los estudiantes y adecuar su enseñanza?',
                    '¿Cómo propiciar un ambiente de respeto y proximidad?',
                    '¿Cómo regular positivamente el comportamiento de los estudiantes?',
                ]
            ],

        ];

        foreach ($trainings as $trainingName => $trainingData) {

            // Copiar las imágenes o generar nuevas si no existen

            //Rutas completas de las imagenes que están fuera de Storage
            $cardImageSourcePath = $sourceCardPath . $trainingData['card_img_path'];
            $coverImageSourcePath = $sourceCoverPath . $trainingData['cover_img_path'];

            //Rutas destino completas en storage
            $cardDestinationPath = $cardImagesDestinationPath . $trainingData['card_img_path'];
            $coverDestinationPath = $coverImagesDestinationPath . $trainingData['cover_img_path'];

            if (File::exists($cardImageSourcePath)) {
                // Copiar la imagen de la tarjeta si existe en la carpeta pública
                File::copy($cardImageSourcePath, $cardDestinationPath);
                $cardImagePath = 'trainings/card_images/' . $trainingData['card_img_path'];
            } else {
                // Si no existe, generar una nueva imagen de tarjeta
                $generatedCardImage = $faker->image($cardImagesDestinationPath, 640, 480, null, false);
                $cardImagePath = 'trainings/card_images/' . $generatedCardImage;
            }

            if (File::exists($coverImageSourcePath)) {
                // Copiar la imagen de la portada si existe en la carpeta pública
                File::copy($coverImageSourcePath, $coverDestinationPath);
                $coverImagePath = 'trainings/cover_images/' . $trainingData['cover_img_path'];
            } else {
                // Si no existe, generar una nueva imagen de portada
                $generatedCoverImage = $faker->image($coverImagesDestinationPath, 1000, 350, null, false);
                $coverImagePath = 'trainings/cover_images/' . $generatedCoverImage;
            }


            // Crear el training
            $training = Training::create([
                'name' => $trainingName,
                'slug' => Str::slug($trainingName),
                'description' => $trainingData['description'],
                'card_img_path' => $cardImagePath,
                'cover_img_path' => $coverImagePath,
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
