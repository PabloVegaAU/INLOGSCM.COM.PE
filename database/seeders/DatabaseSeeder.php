<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;
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
            'name' => 'PCVV2022',
            'type' => 'admin',
            'realname' => 'realname',
            'realsurname' => 'realsurname',
            'email' => 'admin@inlog.com',
            'password' => bcrypt('passwordinlog'),
        ]);

        /* $users = User::factory(9)->create();
        foreach ($users as $user) {
            $inventories = Inventory::factory(3)->create(['user_id' => $user->id]);
            foreach ($inventories as $inventory) {
                Product::factory(5)->create(
                    [
                        'inventory_id' => $inventory->id,
                    ]
                );
            }
        } */
    }
}
