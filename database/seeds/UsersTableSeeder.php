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
        $user = \App\User::where('email','admin@admin.com')->first();

        if(!$user){
            \App\User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678')
            ]);
        }
    }
}
