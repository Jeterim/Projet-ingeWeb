<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            'user_id' => 3,
            'data' => 'contenu du potin qui a été supprimé',
            'created_at' => '2017-06-08 17:34:56',
            'read_at' => '2017-06-08 17:35:56'
        ]);
    }
}
