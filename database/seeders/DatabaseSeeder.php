<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Demo data only (fake names). Run with: php artisan db:seed
        $this->call(EmployeeSeeder::class);
    }
}
