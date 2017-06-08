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
    }
}
