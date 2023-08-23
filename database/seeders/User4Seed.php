<?php

namespace Database\Seeders;

use App\Models\InsertBudget;
use App\Models\OfficeItem;
use Illuminate\Database\Seeder;

class User4Seed extends Seeder
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
            'user_id' => 12,
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
            'user_id' => 12,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'reams',
            'item_description' => "Bondpaper, Multi-Copy, Size: Legal ,70 gsm, Sub 20				
            ",
            'qty' => 50
            ,
            'estimated_cost' =>   300.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 12,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'reams',
            'item_description' => "Bondpaper, Multi-Copy, Size: Legal ,70 gsm, Sub 20				
            ",
            'qty' => 30
            ,
            'estimated_cost' =>   252.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 12,
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
            'user_id' => 12,
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
            'user_id' => 12,
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
            'quarter_id' => 3, 
            'user_id' => 12,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'box',
            'item_description' => "White Mailing Envelope with window (500 pcs per box)				
            ",
            'qty' => 2,
            'estimated_cost' =>   540.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 12,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'book',
            'item_description' => "RECORD BOOK, 500 pages 				
            ",
            'qty' => 10
            ,
            'estimated_cost' =>   250.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 12,
            'category_id' => 1,
            'item_no' => 1,
            'unit_measure' => 'rolls',
            'item_description' => "Adding Maching Paper Roll (57mm x 70mm)				
            ",
            'qty' => 10
            ,
            'estimated_cost' =>   175.00 
            ,
            ],
            
            
            
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 12,
            'category_id' => 2,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Printing Calculator, 12 Digits				
            Specs:				
            Compact Type				
            Clock & Calendar Printing				
            ",
            'qty' => 3
            ,
            'estimated_cost' =>   6500.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 12,
            'category_id' => 2,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Paper Shredder Machine, Automatic, Heavy Duty				
            Specs:				
            Color: Black				
             Shred Capacity: 16 sheets; Shred size: 4x40mm; Security level:4				
            Bin Capacity: 31 Liters				
            ",
            'qty' => 1,
            'estimated_cost' =>   25000.00 
            ,
            ],
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 12,
            'category_id' => 4,
            'item_no' => 1,
            'unit_measure' => 'package',
            'item_description' => "Repair of Exisiting Airconditioning Unit (Condura Window Type Inverter Air Conditioner)				
            Inclusion:				
            Repair Materials, Labor, Clean-up / Installation				
            ",
            'qty' => 1
            ,
            'estimated_cost' =>   18000.00 
            ,
            ],
            
            
            
            
            
            
            [
            'quarter_id' => 3, 
            'user_id' => 12,
            'category_id' => 5,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Office Chair, Swivel				
            Specs: 				
            Pneumatic height adjustment				
            150kg. Maximum weight capacity				
            300mm. Nylon base with PU casters				
            ",
            'qty' => 3
            ,
            'estimated_cost' =>   2800.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 12,
            'category_id' => 5,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Vertical Filling Cabinet, 4 Drawers				
            Specs: 				
            Ergonomic Vertical Filing Cabinet				
            Color: Black				
            ",
            'qty' => 2
            ,
            'estimated_cost' =>   10500.00 
            ,
            ],
            [
            'quarter_id' => 3, 
            'user_id' => 12,
            'category_id' => 5,
            'item_no' => 1,
            'unit_measure' => 'unit',
            'item_description' => "Safety Vault, Medium Size, Heavy Duty				
            Specs: 				
            Material thickness: door 50mm, body 55mm				
            Digital lock with master key and emergency key				
            With wheels				
            ",
            'qty' => 1,
            'estimated_cost' =>   25000.00 
            ,
            ],
            
            
        ];
        
        OfficeItem::insert($officeitem);
        date_default_timezone_set('Etc/GMT-8');
        $isert_budget = [
            [ 
            'user_id' => '12',
            'item_category_id' => '1',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   30885.00,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [ 
            'user_id' => '12',
            'item_category_id' => '2',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   44500.00,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [ 
            'user_id' => '12',
            'item_category_id' => '3',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>  0,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [ 
            'user_id' => '12',
            'item_category_id' => '4',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   18000.00,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [ 
            'user_id' => '12',
            'item_category_id' => '5',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' =>   54400.00,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [ 
            'user_id' => '12',
            'item_category_id' => '6',
            'first_quarter' => 0,
            'second_quarter' => 0,
            'third_quarter' => 0,
            'fourth_quarter' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        InsertBudget::insert($isert_budget);
    }
}
