<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PotinsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        //$this->call(VotesTableSeeder::class);
    }
}
