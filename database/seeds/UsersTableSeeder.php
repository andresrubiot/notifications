<?php

use App\User;
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
        factory(User::class)->create([
            'name' => 'Test User',
            'email' => 'test@notifications.test'
        ]);

        factory(User::class, 10)->create();
    }
}
