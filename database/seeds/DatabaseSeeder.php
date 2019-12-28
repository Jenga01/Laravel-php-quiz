<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {
            User::create([
                'name' => Str::random(8),
                'email' => Str::random(12).'@mail.com',
                'password' => bcrypt('123456')
            ]);
        }

    }
}
