<?php

use Illuminate\Database\Seeder;
use Meddelivery\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Kelton Mauro',
            'surname' => 'Cumbe',
            'email' => 'nakatsinho@gmail.com',
            'username' => 'kcumbe',
            'nascimento' => '2020-08-11',
            'number' => '845248888',
            'altura' => '1.64',
            'talta' => '184',
            'tbaixa' => '119',
            'profissao' => 'Developer',
            'peso' => '174KG',
            'raca' => 'negra',
            'password'=> bcrypt('password'),
            'image' => 'default.png',
            'provider' => 'Google',
            'provider_id' => '102965354267132711337',
            'user_group_id' => '1',
            'sexo_id' => 1,
            'pais_id' => 1,
            'provincia_id' => 1,
            'gsanguineo_id' => 1,
            'doenca_id' => 1,
            'farmacia_id' => 1,
        ]);
    }
}
