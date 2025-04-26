<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => $this->faker->word,
            'kategori' => $this->faker->word,
            'harga' => $this->faker->randomFloat(2, 1000, 100000),
            'stok' => $this->faker->numberBetween(1, 100),
            'deskripsi' => $this->faker->sentence,
            'tanggal_masuk' => $this->faker->date(),
        ];
    }
}
