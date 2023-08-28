<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [ 
            'name' => 'Admin',
            'email' => 'admin',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            'office_id' => null,
            'email_address' => 'admin@gmail.com',
            'phone_number' => '9212969669',
            
            ],
            [ 
            'name' => 'Joselito D. Pamor',
            'email' => 'spmo',
            'password' => bcrypt('spmo123'),
            'rule_id' => 2,
            'office_id' => 35,
            'email_address' => 'spmo@gmail.com',
            'phone_number' => '9212969669',
            ],
            [ 
            'name' => 'Dario B. Eneserio',
            'email' => 'bgmo',
            'password' => bcrypt('bgmo123'),
            'rule_id' => 3,
            'office_id' => 8,
            'email_address' => 'bgmo@gmail.com',
            'phone_number' => '9212969669',
            ],
            [ 
            'name' => 'Cas',
            'email' => 'cas',
            'password' => bcrypt('cas123'),
            'rule_id' => 3,
            'office_id' => 11,
            'email_address' => 'cas@gmail.com',
            'phone_number' => '9212969669',
            ],
            [ 
            'name' => 'Cashier',
            'email' => 'casheir',
            'password' => bcrypt('casheir123'),
            'rule_id' => 3,
            'office_id' => 12,
            'email_address' => 'casheir@gmail.com',
            'phone_number' => '9212969669',
            ],
            [ 
            'name' => 'Igp',
            'email' => 'igp',
            'password' => bcrypt('igp123'),
            'rule_id' => 3,
            'office_id' => 25,
            'email_address' => 'igp@gmail.com',
            'phone_number' => '9212969669',
            ],
            [ 
            'name' => 'Sao',
            'email' => 'sao',
            'password' => bcrypt('sao123'),
            'rule_id' => 3,
            'office_id' => 33,
            'email_address' => 'sao@gmail.com',
            'phone_number' => '9212969669',
            ],
            [ 
            'name' => 'Registrar',
            'email' => 'registrar',
            'password' => bcrypt('registrar123'),
            'rule_id' => 3,
            'office_id' => 30,
            'email_address' => 'registrar@gmail.com',
            'phone_number' => '9212969669',
            ],
        ];

        User::insert($user);
    }
}
