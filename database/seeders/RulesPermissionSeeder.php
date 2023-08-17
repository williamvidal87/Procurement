<?php

namespace Database\Seeders;

use App\Models\RulesPermissionDatabase;
use Illuminate\Database\Seeder;

class RulesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rule = [
            [ 
            'rule_name' => 'Admin',
            ],
            [ 
            'rule_name' => 'SPMO'
            ],
            [ 
            'rule_name' => 'User'
            ],
        ];

        RulesPermissionDatabase::insert($rule);
    }
}
