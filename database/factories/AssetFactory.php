<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends Factory<Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'category_id' => Category::inRandomOrder()->first()->id,

        'asset_code' => 'AST' . fake()->unique()->numberBetween(1000, 9999),

        'name' => fake()->randomElement([
            'Dell Latitude',
            'HP EliteBook',
            'Lenovo ThinkPad',
            'MacBook Air',
            'Samsung Monitor',
            'Logitech Keyboard',
            'Canon Printer',
        ]),

        'serial_number' => strtoupper(fake()->bothify('SN#####??')),

        'status' => fake()->randomElement([
            'Available',
            'Assigned',
            'Maintenance',
            'Retired',
        ]),

        'purchase_date' => fake()->date(),

        'cost' => fake()->randomFloat(2, 300, 3000),
    ];
}
}
