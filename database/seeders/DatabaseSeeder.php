<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Admin-Zugänge werden bewusst nicht geseedet, sondern mit
     * `php artisan shift:user` angelegt, damit kein Standardpasswort existiert.
     */
    public function run(): void
    {
        $this->call(CommercialObjectSeeder::class);
    }
}
