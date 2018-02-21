<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Boisson::class, 50)->create()->each(function ($u) {
            $u->ingredients()->save(factory(App\Ingredient::class)->make(), ['quantity' => rand(1, 5)]);
        });

        DB::table('coins')->insert([
                [
                    'type' => '200',
                ],
                [
                    'type' => '100',
                ],
                [
                    'type' => '50',
                ],
                [
                    'type' => '20',
                ],
                [
                    'type' => '10',
                ],
                [
                    'type' => '5',
                ],
            ]

        );
    }
}
