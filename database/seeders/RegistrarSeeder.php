<?php

namespace Database\Seeders;

use App\Models\OfficeItem;
use Illuminate\Database\Seeder;

class RegistrarSeeder extends Seeder
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
            'user_id' => 8,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'sheets',
            'item_description' => "Printed Transcript of Records (Front)				
            ",
            'qty' => 3000
            ,
            'estimated_cost' =>   15.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 8,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'sheets',
            'item_description' => "Printed Transcript of Records (Body)				
            ",
            'qty' => 3000
            ,
            'estimated_cost' =>   15.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 8,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'unit
            ',
            'item_description' => "Dry Seal (NORSU-G Logo)				
            ",
            'qty' => 3
            ,
            'estimated_cost' =>   4800.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 8,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'packs
            ',
            'item_description' => "Parchment Paper, 10 pcs per pack				
            ",
            'qty' => 100
            ,
            'estimated_cost' =>   65.00 
            ,
            ],
            
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 8,
            'category_id' => 2,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Colored Printer, 3in 1,  Heavy Duty				
            Specs:				
            with free delivery & installation				
            with 1 year warranty				
            ",
            'qty' => 2
            ,
            'estimated_cost' =>   55000.00 
            ,
            ],
            
            
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 8,
            'category_id' => 4,
            'item_no' => 1,
            'unit_measure' => 'package',
            'item_description' => "Repair of Defective Office Printer (1 EPSON L220, 1 EPSON 3110)				
            Inclusion:				
            Repair Materials/Parts, Labor, Clean-up / Installation				
            ",
            'qty' => 1,
            'estimated_cost' =>   9700.00 
            ,
            ],
            
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 8,
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
            'user_id' => 8,
            'category_id' => 5,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Folding Table, Heavy Duty (6ft), Black				
            Specs: 				
            Table Top Material High-Density Polyethylene (HDPE)				
            Frame Material Powder-Coated Steel				
            ",
            'qty' => 2
            ,
            'estimated_cost' =>   6500.00 
            ,
            ],
            
            
            
        ];
        
        OfficeItem::insert($officeitem);
    }
}
