<?php

namespace Database\Seeders;

use App\Models\InsertBudget;
use Illuminate\Database\Seeder;

class InsertBudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Etc/GMT-8');
        $isert_budget = [
            [ 
            'user_id' => '2',
            'item_category_id' => '1',
            'first_quarter' => 59185.00,
            'second_quarter' => 59185.00,
            'third_quarter' =>  59185.00,
            'fourth_quarter' => 59185.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '2',
            'item_category_id' => '2',
            'first_quarter' => 120000.00,
            'second_quarter' => 120000.00,
            'third_quarter' =>  120000.00,
            'fourth_quarter' => 120000.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '2',
            'item_category_id' => '3',
            'first_quarter' => 3500000.00,
            'second_quarter' => 3500000.00,
            'third_quarter' =>  3500000.00,
            'fourth_quarter' => 3500000.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '2',
            'item_category_id' => '4',
            'first_quarter' => 25000.00,
            'second_quarter' => 25000.00,
            'third_quarter' =>  25000.00,
            'fourth_quarter' => 25000.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '2',
            'item_category_id' => '5',
            'first_quarter' => 25500.00,
            'second_quarter' => 25500.00,
            'third_quarter' =>  25500.00,
            'fourth_quarter' => 25500.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '2',
            'item_category_id' => '6',
            'first_quarter' => 55400.00,
            'second_quarter' => 55400.00,
            'third_quarter' =>  55400.00,
            'fourth_quarter' => 55400.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            
            
            
            
            
            
            
            [ 
            'user_id' => '3',
            'item_category_id' => '1',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' => 0,
            'fourth_quarter' => 20370,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '3',
            'item_category_id' => '2',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' => 0,
            'fourth_quarter' => 33700,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '3',
            'item_category_id' => '3',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' => 0,
            'fourth_quarter' => 7500000,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '3',
            'item_category_id' => '4',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' => 0,
            'fourth_quarter' => 850000,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '3',
            'item_category_id' => '5',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' => 0,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '3',
            'item_category_id' => '6',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' => 0,
            'fourth_quarter' => 53250,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            
            
            
            
            
            
            [ 
            'user_id' => '4',
            'item_category_id' => '1',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>  0,
            'fourth_quarter' => 75140.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '4',
            'item_category_id' => '2',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>  0,
            'fourth_quarter' => 204700.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '4',
            'item_category_id' => '3',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>  0,
            'fourth_quarter' => 15700000,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '4',
            'item_category_id' => '4',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>  0,
            'fourth_quarter' => 35000.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '4',
            'item_category_id' => '5',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>  0,
            'fourth_quarter' => 40100.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '4',
            'item_category_id' => '6',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' => 0,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            
            
            
            
            
            
            
            [ 
            'user_id' => '5',
            'item_category_id' => '1',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   0,
            'fourth_quarter' => 30885.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '5',
            'item_category_id' => '2',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   0,
            'fourth_quarter' => 44500.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '5',
            'item_category_id' => '3',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>  0,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '5',
            'item_category_id' => '4',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   0,
            'fourth_quarter' => 18000.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '5',
            'item_category_id' => '5',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   0,
            'fourth_quarter' => 54400.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '5',
            'item_category_id' => '6',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' => 0,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            
            
            
            
            
            
            
            [ 
            'user_id' => '6 ',
            'item_category_id' => '1',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>    0,
            'fourth_quarter' => 11112.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '6 ',
            'item_category_id' => '2',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>    0,
            'fourth_quarter' => 23500.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '6 ',
            'item_category_id' => '3',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   0,
            'fourth_quarter' => 11700000.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '6 ',
            'item_category_id' => '4',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>    0,
            'fourth_quarter' => 23000.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '6 ',
            'item_category_id' => '5',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>    0,
            'fourth_quarter' => 247500.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '6 ',
            'item_category_id' => '6',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' => 0,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            
            
            
            
            
            
            
            [ 
            'user_id' => '7',
            'item_category_id' => '1',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>     0,
            'fourth_quarter' => 48020.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '7',
            'item_category_id' => '2',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>     0,
            'fourth_quarter' => 23500.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '7',
            'item_category_id' => '3',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   0,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '7',
            'item_category_id' => '4',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>     0,
            'fourth_quarter' => 135000.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '7',
            'item_category_id' => '5',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>     0,
            'fourth_quarter' => 15900.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '7',
            'item_category_id' => '6',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>  0,
            'fourth_quarter' => 60000.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            
            
            
            
            
            
            
            [ 
            'user_id' => '8',
            'item_category_id' => '1',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>      0,
            'fourth_quarter' => 110900.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '8',
            'item_category_id' => '2',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>      0,
            'fourth_quarter' => 110000.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '8',
            'item_category_id' => '3',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   0,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '8',
            'item_category_id' => '4',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>      0,
            'fourth_quarter' => 9700.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '8',
            'item_category_id' => '5',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>      0,
            'fourth_quarter' => 2400.00,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
            [ 
            'user_id' => '8',
            'item_category_id' => '6',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>  0,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'year_budget' => '2023',
            ],
        ];

        InsertBudget::insert($isert_budget);
    }
}
