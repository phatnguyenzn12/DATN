<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Role::create(
            [
                'name' => 'admin',
            ]
        );
        Role::create(
            [
                'name' => 'manager',
            ]
        );
        Role::create(
            [
                'name' => 'teacher',
            ]
        );
        Role::create(
            [
                'name' => 'student',
            ]
        );

        //---Permission chưa cần đến phân quyền---

        $users = [
            [
                'name' => fake()->name(),
                'email' => 'admin@example.com',
                'password' => Hash::make('12345678'),
                'avatar' => 'placeholder.png',
                'number_phone' => '012345678',
                'type' => 1
            ],
            [
                'name' => fake()->name(),
                'email' => 'mentor@example.com',
                'password' => Hash::make('12345678'),
                'avatar' => 'placeholder.png',
                'number_phone' => '012345678',
                'type' => 2
            ],
            [
                'name' => fake()->name(),
                'email' => 'student@example.com',
                'password' => Hash::make('12345678'),
                'avatar' => 'placeholder.png',
                'number_phone' => '012345678',
                'type' => 3
            ],
        ];
        DB::table('users')->insert($users);

        
    }
}
