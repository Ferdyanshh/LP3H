<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::unguarded(function () {
            User::updateOrCreate(
                ['email' => 'admin@lp3h.test'],
                ['name' => 'Admin LP3H', 'password' => 'password', 'role' => 'admin']
            );

            User::updateOrCreate(
                ['email' => 'peserta@lp3h.test'],
                ['name' => 'Peserta Contoh', 'password' => 'password', 'role' => 'peserta']
            );
        });
    }
}
