<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Проверуваме дали веќе постои администратор со ист email
        $adminExists = User::where('email', 'admin@example.com')->exists();

        if (!$adminExists) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'is_admin' => true,
            ]);

            $this->command->info('✅ Admin user successfully created!');
        } else {
            $this->command->warn('⚠️ Admin user already exists, skipping creation.');
        }
    }
}
