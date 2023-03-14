<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $book = DB::table('books')->pluck('id')->toArray();
        $author = DB::table('authors')->pluck('id')->toArray();

        for ($i = 0; $i < 50000; $i++) {
            $bookId= $faker->randomElement($book);
            $authorId= $faker->randomElement($author);

            DB::table('ratings')->insert([
                'book_id' => $bookId,
                'author_id' => $authorId,
                'rate' => $faker->numberBetween(1, 10),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
