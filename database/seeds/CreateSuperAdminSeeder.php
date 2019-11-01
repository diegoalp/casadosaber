<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Diêgo Pessoa', 
        	'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'superadmin'
        ]);

        $user = User::create([
        	'name' => 'Flecson Ferreira', 
        	'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'admin'
        ]);

        $user = User::create([
        	'name' => 'Letticia Miller', 
        	'email' => 'financeiro@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'financeiro'
        ]);

        $user = User::create([
        	'name' => 'Letticia Miller', 
        	'email' => 'professor@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'professor'
        ]);

        $user = User::create([
        	'name' => 'José Alves', 
        	'email' => 'pai@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'pai'
        ]);
    }
}
