<?php

use App\User;
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
        $user = new User;

        $user->name = 'Cristian Galeano';
        $user->email = 'cristian.galeano1913@gmail.com';
        $user->password = bcrypt('secret');

        $user->save();

        $user = new User;

        $user->name = 'Camilo Soler';
        $user->email = 'csoler@gmail.com';
        $user->password = bcrypt('secret');

        $user->save();
    }
}
