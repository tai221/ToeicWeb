<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('tests')->insert([
                'accessCount' => $faker->randomNumber(),
                'title' => $faker->unique()->text,
                'audio' => $faker->text,
                'created_at' => $faker->date()
            ]);
        }
    }
}
