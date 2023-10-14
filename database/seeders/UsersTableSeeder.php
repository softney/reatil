<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        $user = User::create([
            'name'      => 'Wilson Neira',
            'dni'       => '11627784-0',
            'phone'     => '(+56) 978041698',
            'email'     => 'wilson.neira@outlook.cl',
            'profile'      => 'Administrador',
            'password'  => bcrypt('Antoni@.8'),
        ]);

        $user->assignRole('Administrador');
    }
}
