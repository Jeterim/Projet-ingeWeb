<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'pseudo' => 'johndoe',
            'nom' => 'Doe',
            'prenom' => 'John',
            'email' => 'john.doe@insa-cvl.fr',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'pseudo' => 'jpetit',
            'nom' => 'Petit',
            'prenom' => 'Jeremy',
            'email' => 'jeremy.petit@insa-cvl.fr',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'pseudo' => 'qlaplanc',
            'nom' => 'Laplanche',
            'prenom' => 'Quentin',
            'email' => 'quentin.laplanche@insa-cvl.fr',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'pseudo' => 'fgauthe',
            'nom' => 'Gauthe',
            'prenom' => 'Fabien',
            'email' => 'fabien.gauthe@insa-cvl.fr',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'pseudo' => 'ldimarti',
            'nom' => 'Di Martino',
            'prenom' => 'Lucas',
            'email' => 'lucas.di_martino@insa-cvl.fr',
            'password' => bcrypt('secret'),
        ]);
    }
}
