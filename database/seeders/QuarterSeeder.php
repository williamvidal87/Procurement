<?php

namespace Database\Seeders;

use App\Models\Quarter;
use Illuminate\Database\Seeder;

class QuarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quarter = [
            [ 
            'quarter' => '1st Quarter',
            ],
            [ 
            'quarter' => '2nd Quarter'
            ],
            [ 
            'quarter' => '3rd Quarter'
            ],
            [ 
            'quarter' => '4th Quarter'
            ],
        ];

        Quarter::insert($quarter);
    }
}
