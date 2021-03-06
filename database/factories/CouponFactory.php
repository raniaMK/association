<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $numero = $this->faker->numberBetween($min = 100, $max = 99999999);
        $montant = $this->faker->numberBetween($min = 100, $max = 500);
        $validité = $this->faker->date();

        return [
            'numero'=>$numero,
            'montant'=>$montant,
            'validité'=>$validité,
    
        ];
    }
}
