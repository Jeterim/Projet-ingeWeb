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

        DB::table('potins')->insert([
            'user_id' => 5,
            'content' => 'Amine a bu pendant le ramadan en pleine journée',
            'created_at' => '2017-06-13 16:38:56',
            'updated_at' => '2017-06-13 16:38:56'
        ]);

        DB::table('potins')->insert([
            'user_id' => 4,
            'content' => 'Négociation du diplome d\'ingénieur en cours pour certains élèves',
            'created_at' => '2017-06-14 16:38:56',
            'updated_at' => '2017-06-14 16:38:56'
        ]);

        DB::table('potins')->insert([
            'user_id' => 5,
            'content' => 'Vincent était présent aujoud\'hui au cours',
            'created_at' => '2017-06-15 16:38:56',
            'updated_at' => '2017-06-15 16:38:56'
        ]);

        DB::table('potins')->insert([
            'user_id' => 4,
            'content' => 'Négociation du diplome d\'ingénieur en cours pour certains élèves',
            'created_at' => '2017-06-14 16:38:56',
            'updated_at' => '2017-06-14 16:38:56'
        ]);

        DB::table('potins')->insert([
            'user_id' => 3,
            'content' => 'Lucas va se mettre au sport',
            'created_at' => '2017-06-14 16:38:56',
            'updated_at' => '2017-06-14 16:38:56'
        ]);

        DB::table('potins')->insert([
            'user_id' => 3,
            'content' => 'Le partiel de sécurité était super dur !',
            'created_at' => '2017-06-15 16:38:56',
            'updated_at' => '2017-06-15 16:38:56'
        ]);
    }
}
