<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'user',
            'realname' => 'realname',
            'realsurname' => 'realsurname',
            'email' => 'user@example.com',
            'password' => bcrypt('123'),
        ]);

        User::factory(10)->create();
    }
}
