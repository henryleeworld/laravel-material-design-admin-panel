<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => __('Administrator'),
            'email' => 'admin@admin.com',
        ]);
    }
}
