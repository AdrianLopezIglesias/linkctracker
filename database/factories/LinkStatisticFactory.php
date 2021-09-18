<?php

namespace Database\Factories;

use App\Models\LinkStatistic;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkStatisticFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LinkStatistic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'link_id' => $this->faker->randomDigitNotNull,
        'user_ip' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'user_id' => $this->faker->randomDigitNotNull
        ];
    }
}
