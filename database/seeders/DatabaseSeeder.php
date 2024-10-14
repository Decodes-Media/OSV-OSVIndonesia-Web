<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('  > Start seeding...');
        $this->command->newLine();

        $startTime = microtime(true);

        activity()->disableLogging();

        $this->call(IndonesiaDatabaseSeeder::class);
        $this->call(BaseDatabaseSeeder::class);
        $this->call(MasterDatabaseSeeder::class);
        $this->call(ClientSeeder::class);

        activity()->enableLogging();

        $endTime = round(microtime(true) - $startTime, 2);

        $this->command->info("  > ✔ OK: Took {$endTime} seconds.");
    }
}
