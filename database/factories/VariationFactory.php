<?php

namespace Database\Factories;

use App\Models\Variation;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Variation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attrName' => $this->faker->name,
            'attrValue' => $this->faker->name,
            'price' => rand(10, 200),
            'image' => $this->faker->image('public/storage/images',640,480, 'nature', false),
            'product_id' => rand(1, 5)
        ];
    }
}
