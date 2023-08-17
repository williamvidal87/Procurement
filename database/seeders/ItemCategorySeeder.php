<?php

namespace Database\Seeders;

use App\Models\ItemCategory;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item_category = [
            [ 
            'item_category' => 'Office Supplies',
            ],
            [ 
            'item_category' => 'Office Equipment'
            ],
            [ 
            'item_category' => 'Infrastructure'
            ],
            [ 
            'item_category' => 'Repairs & Maintenance'
            ],
            [ 
            'item_category' => 'Furniture & Fixture'
            ],
            [ 
            'item_category' => 'Others'
            ],
        ];

        ItemCategory::insert($item_category);
    }
}
