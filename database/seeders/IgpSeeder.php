<?php

namespace Database\Seeders;

use App\Models\OfficeItem;
use Illuminate\Database\Seeder;

class IgpSeeder extends Seeder
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
            'user_id' => 6,
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
            'user_id' => 6,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'reams
            ',
            'item_description' => "Bondpaper, Multi-Copy, Size: Legal ,70 gsm, Sub 20				
            ",
            'qty' => 20
            ,
            'estimated_cost' =>   300.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 6,
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
            'user_id' => 6,
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
            'user_id' => 6,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'box',
            'item_description' => "FOLDER, White, Size: Legal				
            ",
            'qty' => 1,
            'estimated_cost' =>   840.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 6,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'book
            ',
            'item_description' => "RECORD BOOK, 500 pages 				
            ",
            'qty' => 3
            ,
            'estimated_cost' =>   144.00 
            ,
            ],
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 6,
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
            'user_id' => 6,
            'category_id' => 3,
            'item_no' => 1,
            'unit_measure' => 'lot',
            'item_description' => "Construction of 1 Storey Building / Function Hall with 2 Comfort Rooms (Income Generating Project of the Campus)				
            ",
            'qty' => 1,
            'estimated_cost' =>   1700000.00 
            ,
            ],
            
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 6,
            'category_id' => 4,
            'item_no' => 1,
            'unit_measure' => 'package',
            'item_description' => "Repair of Exisiting Airconditioning Unit (Carrier Window Type Inverter Air Conditioner 2.5HP)				
            Inclusion:				
            Repair Materials / Parts, Labor, Clean-up / Installation				
            ",
            'qty' => 1,
            'estimated_cost' =>   23000.00 
            ,
            ],
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 6,
            'category_id' => 5,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Monobloc Chairs, Plastic, Color: White				
            Specs:				
            Lighweight				
            Seat Width: 375 mm				
            Seat Depth: 330 mm				
            with engraved NORSU-G Logo				
            free delivery				
            ",
            'qty' => 250
            ,
            'estimated_cost' =>   600.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 6,
            'category_id' => 5,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Folding Table, Heavy Duty (6ft), Black				
            Specs: 				
            Table Top Material High-Density Polyethylene (HDPE)				
            Frame Material Powder-Coated Steel				
            with engraved / sticker NORSU-G Logo				
            free delivery				
            ",
            'qty' => 15
            ,
            'estimated_cost' =>   6500.00 
            ,
            ],
            
            
        ];
        
        OfficeItem::insert($officeitem);
    }
}
