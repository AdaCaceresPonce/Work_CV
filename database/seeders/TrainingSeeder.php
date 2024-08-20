<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainings = [

            'Planificación curricular nivel secundaria' => [
                'Perfil de Egreso de la Educación',
                'Enfoques transversales',
                'Planificación curricular',
                'Necesidades de aprendizaje',
                'Evidencias de aprendizajes',
                'Situaciones significativas',
                'Competencias, capacidades y desempeños',
                'Estándares de aprendizajes'
            ],

            'Enfoque por competencias' => [
                'Conferencia Mundial: "Educación para Todos"',
                'Cambios en la educación',
                '¿Qué es el enfoque por competencias',
                'Antecedentes del enfoque por competencias',
                'Evaluación de las Competencias'
            ],

            'Evaluación Formativa' => [
                'Definición de evaluación formativa',
                'Característica de la evaluación formativa',
                'Objetivo de la evaluación formativa',
                'Aspectos de la evaluación formativa',
                'Marco normativo de la evaluación formativa'
            ],

            'Evaluación diagnóstica' => [
                'Importancia de la evaluación diagnóstica',
                'Normativa vigente',
                '¿Cómo realizamos la evaluación diagnóstica?',
                '¿Cómo analizamos la información obtenida?',
                'Toma de decisiones'
            ],

            'Rúbricas de Observación de Aula' => [
                'Rúbricas de Observación de Aula',
                '¿Cómo involucrar activamente a los estudiantes en el proceso de aprendizaje?',
                '¿Cómo promover el razonamiento, la creatividad y/o pensamiento crítico?',
                '¿Cómo evaluar el progreso de los aprendizajes para retroalimentar a los estudiantes y adecuar su enseñanza?',
                '¿Cómo propiciar un ambiente de respecto y proximidad?',
                '¿Cómo regular positivamente el comportamiento de los estudiantes?',
            ],

        ];
    }
}
