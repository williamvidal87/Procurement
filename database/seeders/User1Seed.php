<?php

namespace Database\Seeders;

use App\Models\InsertBudget;
use App\Models\OfficeItem;
use Illuminate\Database\Seeder;

class User1Seed extends Seeder
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
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'pcs',
            'item_description' => "Ballpen, Black (0.5mm), Good Quality				
            ",
            'qty' => 15
            ,
            'estimated_cost' =>   24.00 
            ,
            ],
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'reams',
            'item_description' => "Bondpaper, Multi-Copy, Size: A4 ,70 gsm, Sub 20				
            ",
            'qty' => 50
            ,
            'estimated_cost' =>   252.00 
            ,
            ],
            [
            'quarter_id' => 1, 
            'user_id' => 2,
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
            'quarter_id' => 1, 
            'user_id' => 2,
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
            'quarter_id' => 1, 
            'user_id' => 2,
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
            'quarter_id' => 1, 
            'user_id' => 2,
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
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'box',
            'item_description' => "PENCIL, lead, with eraser, #2 (12 pcs per box), Good Quality				
            ",
            'qty' => 1,
            'estimated_cost' =>   115.00 
            ,
            ],
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'set',
            'item_description' => "Printer Ink for EPSON L220 (C,M,Y,BK) 				
            ",
            'qty' => 5
            ,
            'estimated_cost' =>   1680.00 
            ,
            ],
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'book',
            'item_description' => "RECORD BOOK, 500 pages 				
            ",
            'qty' => 5
            ,
            'estimated_cost' =>   144.00 
            ,
            ],
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'bottle',
            'item_description' => "STAMP PAD INK, purple or violet				
            ",
            'qty' => 3
            ,
            'estimated_cost' =>   60.00 
            ,
            ],
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'box
            ',
            'item_description' => "STAPLE WIRE for heavy duty stapler				
            ",
            'qty' => 15
            ,
            'estimated_cost' =>   102.00 
            ,
            ],
            
            
            
            
            
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 2,
            'item_no' => 1,
            'unit_measure' => 'unit
            ',
            'item_description' => "Digital Photocopying Machine, Colored, Heavy Duty				
            Specs:				
            Supported Paper Size: A4, A3, Legal, Short				
            with free delivery & installation				
            with 1 year warranty				
            ",
            'qty' => 1,
            'estimated_cost' =>   120000.00 
            ,
            ],
            
            
            
            
            
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 3,
            'item_no' => 1,
            'unit_measure' => 'lot',
            'item_description' => "Repair / Rehabilitaiton / Improvement of Existing Supply Property Management Office (CareCenter)				
            ",
            'qty' => 1,
            'estimated_cost' =>   3500000.00 
            ,
            ],
            
            
            
            
            
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 4,
            'item_no' => 1,
            'unit_measure' => 'package',
            'item_description' => "Repair of Defective Office Printer (3 EPSON L220, 4 EPSON 3110)				
            Inclusion:				
            Repair Materials/Parts, Labor, Clean-up / Installation				
            ",
            'qty' => 1,
            'estimated_cost' =>   25000.00 
            ,
            ],
            
            
            
            
            
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 5,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Office Table with Drawers (Wooden)				
            Specs:				
            Dimension: W120 x D60 x H75 cm				
            Material: MDF board				
            – With center and both side drawers and cabinet				
            – Locking system with key included				
            ",
            'qty' => 3
            ,
            'estimated_cost' =>   8500.00 
            ,
            ],
            
            
            
            
            
            
            
            
            
            
            
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 6,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Plastic Pallet for NORSU-G Dropside Vehicle				
            Specs:				
            Size: 43x43				
            Color: Black				
            Floor Capacity: 30,000 lbs				
            ",
            'qty' => 10
            ,
            'estimated_cost' =>   4700.00 
            ,
            ],
            [
            'quarter_id' => 1, 
            'user_id' => 2,
            'category_id' => 6,
            'item_no' => 1,
            'unit_measure' => 'pcs',
            'item_description' => "Waterproof Canvass (Lona Trapal - With eyelet)				
            Specs:				
            Color: Black				
            Size: 10 x 10 Ft				
            ",
            'qty' => 3
            ,
            'estimated_cost' =>   2800.00 
            ,
            ],
        ];
        
        OfficeItem::insert($officeitem);
        
        
        
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
            ],
            [ 
            'user_id' => '2',
            'item_category_id' => '2',
            'first_quarter' => 120000,
            'second_quarter' => 120000,
            'third_quarter' =>  120000.00,
            'fourth_quarter' => 120000,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [ 
            'user_id' => '2',
            'item_category_id' => '3',
            'first_quarter' => 3500000,
            'second_quarter' => 3500000,
            'third_quarter' =>  3500000.00,
            'fourth_quarter' => 3500000,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [ 
            'user_id' => '2',
            'item_category_id' => '4',
            'first_quarter' => 25000,
            'second_quarter' => 25000,
            'third_quarter' =>  25000.00,
            'fourth_quarter' => 25000,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [ 
            'user_id' => '2',
            'item_category_id' => '5',
            'first_quarter' => 25500,
            'second_quarter' => 25500,
            'third_quarter' =>  25500.00,
            'fourth_quarter' => 25500,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [ 
            'user_id' => '2',
            'item_category_id' => '6',
            'first_quarter' => 25500,
            'second_quarter' => 25500,
            'third_quarter' =>  55400.00,
            'fourth_quarter' => 25500,
            'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        InsertBudget::insert($isert_budget);
    }
}
