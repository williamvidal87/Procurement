<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PrNumberSeeder::class,
            QuarterSeeder::class,
            RequestCategorySeeder::class,
            ItemCategorySeeder::class,
            RulesPermissionSeeder::class,
            OfficeSeeder::class,
            UserSeeder::class,
            StatusSeeder::class,
            OfficeItemSeeder::class,
            InsertBudgetSeeder::class,
            CasSeeder::class,
            CashierSeeder::class,
            IgpSeeder::class,
            SpmoSeeder::class,
            SaoSeeder::class,
            RegistrarSeeder::class,
            // User1Seed::class,
            // User2Seed::class,
            // User3Seed::class,
            // User4Seed::class
        ]);
    }
}
