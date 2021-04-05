<?php

namespace Database\Factories;

use App\Models\Personne;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personne::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
{
    $nom = $this->faker->word();
    $prenom = $this->faker->word();
    $CIN = $this->faker->numerify('########');
    $date_naiss = $this->faker->date();
    $tel = $this->faker->phoneNumber();
    $adresse = $this->faker->sentence();
    $Situation_Fam = $this->faker->word();
    $nb_enfants = $this->faker->randomDigit();
    return [
        'nom' => $nom,
        'prenom' => $prenom,
        'CIN' => $CIN,
        'date_naiss' => $date_naiss,
        'tel' => $tel,
        'adresse' => $adresse,
        'Situation_Fam' => $Situation_Fam,
        'nb_enfants' => $nb_enfants,

    ];
}
}
