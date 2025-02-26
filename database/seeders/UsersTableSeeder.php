<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        $user = User::create([
                    'name' => 'Admin',
                    'email' => 'azraaz89@gmail.com',
                    'password' => Hash::make('87654321')
                    ]);
        $user->roles()->sync([1]);
    }
}
