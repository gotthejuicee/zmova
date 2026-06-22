<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $email = (string) env('ADMIN_EMAIL', 'admin@zmova.com.ua');
        $password = (string) env('ADMIN_PASSWORD', 'zmova-admin-2026');

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => (string) env('ADMIN_NAME', 'Адміністратор'),
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ],
        );

        $this->command?->info("Адмін готовий: {$email}");
    }
}
