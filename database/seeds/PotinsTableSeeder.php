<?php

use Illuminate\Database\Seeder;

class PotinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('potins')->insert([
            'user_id' => 1,
            'content' => 'Le premier potin',
            'created_at' => '2017-06-08 15:34:56',
            'updated_at' => '2017-06-08 15:34:56'
        ]);
        DB::table('potins')->insert([
            'user_id' => 1,
            'content' => 'Le deuxième pour rien dire',
            'created_at' => '2017-06-08 16:34:56',
            'updated_at' => '2017-06-08 16:34:56'
        ]);

        DB::table('potins')->insert([
            'user_id' => 2,
            'content' => 'Un',
            'created_at' => '2017-06-12 16:35:56',
            'updated_at' => '2017-06-12 16:35:56'
        ]);
        DB::table('potins')->insert([
            'user_id' => 2,
            'content' => 'Deux',
            'created_at' => '2017-06-12 16:36:56',
            'updated_at' => '2017-06-12 16:36:56'
        ]);
        DB::table('potins')->insert([
            'user_id' => 3,
            'content' => 'Trois',
            'created_at' => '2017-06-12 16:37:56',
            'updated_at' => '2017-06-12 16:38:56'
        ]);
        DB::table('potins')->insert([
            'user_id' => 4,
            'content' => 'Quatre',
            'created_at' => '2017-06-12 16:38:56',
            'updated_at' => '2017-06-12 16:38:56'
        ]);
    }
}
