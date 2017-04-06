<?php

use Illuminate\Database\Seeder;
use Larashop\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        $user->name = 'admin';
        $user->email = 'atendimento@preseme.com.br';
        $user->password = bcrypt('preseme');

        $user->save();
    }
}
