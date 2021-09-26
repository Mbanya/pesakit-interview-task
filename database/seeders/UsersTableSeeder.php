<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::query()
            ->create([
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'phone_number'=>'0712345678',
                'password'=>\Hash::make('password'),
                'is_admin'=>true,
                'remember_token' => Str::random(10),
            ]);
    }
}
