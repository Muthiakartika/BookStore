<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $authorId = DB::table('authors')->pluck('id')->toArray();
        $categoryId = DB::table('categories')->pluck('id')->toArray();
        $voter = DB::table('authors')->pluck('totVote')->toArray();

        for ($i = 0; $i < 10000; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'author_id' => $faker->randomElement($authorId),
                'category_id' => $faker->randomElement($categoryId),
                'avgRating' => $faker->randomFloat(2, 1,10),
                'totVote' => $faker->randomElement($voter),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
