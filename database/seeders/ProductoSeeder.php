<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert(
            [
                'name' => 'Aceite Girasol',
                'price' => 8.50,
                'observation' => 'en stock',
                'size' => 'familiar'
            ],
            );
    }
}
