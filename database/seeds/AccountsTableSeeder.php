<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
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
            DB::table('accounts')->insert([
                'username' => $faker->unique()->name,
                'password' => $faker->unique()->password,
                'email' => $faker->unique()->email,
                'hasRole' => 'ROLE_USER',
                'active' => 1
            ]);
        }
    }
}
