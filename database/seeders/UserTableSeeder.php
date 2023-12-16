<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store = new User();
        $store->name = 'Admin';
        $store->email = 'bagus.candrabudi@gmail.com';
        $store->password = bcrypt('randomstring');
        $store->save();
    }
}
