<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use RuntimeException;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve the main application user's configuration.
        $mainUser = config('seeders.main_user');

        // Ensure the required account details are configured.
        if (empty($mainUser['name']) || empty($mainUser['email']) || empty($mainUser['password'])) {
            throw new RuntimeException('Main user configuration is incomplete.');
        }

        // Create the main application user if it doesn't exist.
        User::firstOrCreate(
            ['email' => $mainUser['email']],
            [
                'name' => $mainUser['name'],
                'password' => $mainUser['password'],
                'email_verified_at' => now(),
            ]
        );

        // Generate additional accounts to support local development and testing.
        if (app()->environment('local')) {
            User::factory()->count(5)->create();
        }
    }
}
