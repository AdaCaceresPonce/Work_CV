<?php

namespace Database\Factories;

use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inquiry>
 */
class InquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Probabilidad de tener información en training_id
        $hasTraining = $this->faker->boolean(70); // 70% de probabilidad de tener categoría
        $training = $hasTraining ? Training::inRandomOrder()->first() : null;

        // Generar fecha aleatoria entre hace 1 semana y ahora
        $createdAt = $this->faker->dateTimeBetween('-1 week', 'now');

        return [
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'institution_name' => $this->faker->randomElement(['Universidad', 'Instituto', 'Colegio', 'Academia']) . ' ' . $this->faker->company,
            'location' => $this->faker->city . ', ' . $this->faker->state,
            'training_id' => $training ? $training->id : null,
            'contact_number' => $this->faker->phoneNumber,
            'message' => $this->faker->text(400),
            'state' => $this->faker->randomElement(['Nuevo', 'Pendiente', 'Atendido']),
            'created_at' => $createdAt,
            'updated_at' => $createdAt, // Mantener created_at y updated_at iguales si es necesario
        ];
    }
}
