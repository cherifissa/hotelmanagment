<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Commentaire::class;

    public function definition(): array
    {
        return [
            'contenu' => $this->faker->sentence(),
            'client_id' => function () {
                $clientUser = User::where('isadmin', 'client')->inRandomOrder()->first();
                return $clientUser->id;
            },
        ];
    }
}
