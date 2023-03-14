<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('authors')->insert([
                'name' => $faker->name,
                'totVote' => $faker->numberBetween(1, 10000),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
