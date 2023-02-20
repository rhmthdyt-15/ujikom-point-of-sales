<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition()
    {
        $kategori = Kategori::inRandomOrder()->first();

        $nama_produk = $this->faker->words($this->faker->numberBetween(1, 2), true);

        return [
            'kode_produk' => $this->faker->unique()->bothify('##??'),
            'nama_produk' => $nama_produk,
            'id_kategori' => $kategori->id_kategori,
            'merk' => $this->faker->word(),
            'harga_beli' => $this->faker->numberBetween(1000, 100000),
            'harga_jual' => $this->faker->numberBetween(100000, 1000000),
            'diskon' => $this->faker->randomFloat(2, 0, 1),
            'stok' => $this->faker->numberBetween(0, 100),
        ];
    }
}
