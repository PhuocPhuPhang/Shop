<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'         =>'tuanabc@gmail.com',
            'password'      =>Hash::make('123ab'),
            'level'         =>0,
            'remember_token'=> str_random(10),
        ]);
        
    }
}
