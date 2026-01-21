<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        User::updateOrCreate(
            ['email' => 'mubeenmetait@gmail.com'], // unique check
            [
                'name'              => 'Mubeen Tahir',
                'password'          => Hash::make('Mubeen@123'),
                'email_verified_at' => now(),
            ]
        );

    }
}
