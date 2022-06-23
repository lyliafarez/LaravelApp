<?php

namespace Database\Seeders;

use App\Models\Role;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
           'email'=>'admin@gmail.com',
           'name'=>'farez lylia',
           'password'=>Hash::make('1234test'),
           'role_id'=> 7,
       ]); 
       /* Role::get()->each(function ($role) {
        \App\Models\User::factory(5)->create([
            'role_id' => $role->id,
        ]);
    }); */
}


    
}
