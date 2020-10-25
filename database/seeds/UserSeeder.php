<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Javier Ruiz Trejo',
            'email' => 'jruizt850@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        User::create([
            'name' => 'Dafne Reyes Rodríguez',
            'email' => 'dreyesp1p3711@gmail.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
