<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{Hash, DB};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bob.brown@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Charlie Davis',
                'email' => 'charlie.davis@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Diana Evans',
                'email' => 'diana.evans@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Ethan Harris',
                'email' => 'ethan.harris@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Fiona Clark',
                'email' => 'fiona.clark@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'George Lewis',
                'email' => 'george.lewis@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Hannah Walker',
                'email' => 'hannah.walker@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Robertson Morales',
                'email' => 'robertsonmorales23@gmail.com',
                'password' => Hash::make('password'),
            ]
        ];

        DB::table('users')->insert($users);
    }
}
