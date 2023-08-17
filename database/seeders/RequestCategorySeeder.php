<?php

namespace Database\Seeders;

use App\Models\RequestCategory;
use Illuminate\Database\Seeder;

class RequestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $request_category = [
            [ 
            'request_category' => 'Competitive / Public Bidding',
            ],
            [ 
            'request_category' => 'Small Value Procurement – (SVP)'
            ],
        ];

        RequestCategory::insert($request_category);
    }
}
