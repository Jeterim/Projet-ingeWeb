<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => 1,
            'potin_id' => 1,
            'content' => 'Un petit commentaire',
            'created_at' => '2017-06-08 17:34:56',
            'updated_at' => '2017-06-08 17:34:56'
        ]);
        DB::table('comments')->insert([
            'user_id' => 1,
            'potin_id' => 1,
            'content' => 'Et pourquoi pas un deuxième',
            'created_at' => '2017-06-08 17:34:56',
            'updated_at' => '2017-06-08 17:34:56'
        ]);
    }
}
