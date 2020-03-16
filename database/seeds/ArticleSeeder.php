<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        $data = [];
        $users = App\User::pluck('id')->toArray();
        $title = $faker->sentence(rand(6,10));

        for ($i = 1; $i <= 100; $i++) {
            array_push($data, [
                'title' => $title,
                'sub_title' => $faker->sentence(rand(10,15)),
                'slug' => Str::slug($title),
                'body' =>$faker ->realText(4000),
                'published_at' => $faker->dateTime(),
                'user_id'=> $faker->randomElement($users),
            ]);
        }

    DB::table('articles')->insert($data);




    }
}
