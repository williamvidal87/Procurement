<?php

namespace Database\Seeders;

use App\Models\OfficeItem;
use Illuminate\Database\Seeder;

class SaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officeitem = [
        
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'pcs',
            'item_description' => "Ballpen, Black (0.5mm), Good Quality				
            ",
            'qty' => 10
            ,
            'estimated_cost' =>   24.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'box',
            'item_description' => "ENVELOPE, Documentary, Legal (500 pcs per box)				
            ",
            'qty' => 1,
            'estimated_cost' =>   1800.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'box',
            'item_description' => "ENVELOPE, Expanding, Kraft (100 pcs per box) 				
            ",
            'qty' => 1,
            'estimated_cost' =>   1800.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'box',
            'item_description' => "FOLDER, White, Size: Legal				
            ",
            'qty' => 2
            ,
            'estimated_cost' =>   840.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'reams',
            'item_description' => "Bondpaper, Multi-Copy, Size: A4 ,70 gsm, Sub 20				
            ",
            'qty' => 50
            ,
            'estimated_cost' =>   250.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'reams',
            'item_description' => "Bondpaper, Multi-Copy, Size: Legal ,70 gsm, Sub 20				
            ",
            'qty' => 100
            ,
            'estimated_cost' =>   300.00 
            ,
            ],
            
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 2,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Colored Printer, 3 in 1, Good Quality				
            Specs:				
            Print, Scan, Copy and Fax				
            Borderless Printing up to A4 size				
            with 1 year warranty				
            ",
            'qty' => 1,
            'estimated_cost' =>   23500.00 
            ,
            ],
            
            
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 4,
            'item_no' => 1,
            'unit_measure' => 'package',
            'item_description' => "Repair of Exisiting Office Ceiling & Roofing				
            Inclusion:				
            Repair Materials, Labor, Clean-up / Installation				
            ",
            'qty' => 1,
            'estimated_cost' =>   135000.00 
            ,
            ],
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 5,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Executive Office Chair (400lbs Wide Seat)				
            Specs: 				
            High Back PU Leather Ergonomic Chair				
            Adjustable Armrest				
            360° Swivel Office Chair Adjustable Height				
            ",
            'qty' => 2
            ,
            'estimated_cost' =>   4700.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 5,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Folding Table, Heavy Duty (6ft), Black				
            Specs: 				
            Table Top Material High-Density Polyethylene (HDPE)				
            Frame Material Powder-Coated Steel				
            ",
            'qty' => 1,
            'estimated_cost' =>   6500.00 
            ,
            ],
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 6,
            'item_no' => 1,
            'unit_measure' => 'lot',
            'item_description' => "Food Provision (2 days) for  Leadership Training 2023				
            ",
            'qty' => 1,
            'estimated_cost' =>   25000.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 6,
            'item_no' => 1,
            'unit_measure' => 'package',
            'item_description' => "Sound System Rental (2 days) for Leadership Training 2023				
            ",
            'qty' => 1,
            'estimated_cost' =>   17000.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 7,
            'category_id' => 6,
            'item_no' => 1,
            'unit_measure' => 'lot',
            'item_description' => "Supplies & Materials for Leadership Training 2023				
            ",
            'qty' => 1,
            'estimated_cost' =>   18000.00 
            ,
            ],
            
            
            
            
            
        ];
        
        OfficeItem::insert($officeitem);
    }
}
