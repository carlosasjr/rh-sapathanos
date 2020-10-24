<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TableUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carlos',
            'email' => 'carlos@hotmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
