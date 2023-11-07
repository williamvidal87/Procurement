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
            'phone_number' => '9973613510',
            ],
            [ 
            'name' => 'ENGR. JOSELITO D. PAMOR',
            'email' => '202335SPMO',
            'password' => bcrypt('spmo123'),
            'rule_id' => 2,
            'office_id' => 35,
            'email_address' => 'spmo@gmail.com',
            'phone_number' => '9973613510',
            ],
            [ 
            'name' => 'DARIO B. ENESERIO',
            'email' => '202308BGMO',
            'password' => bcrypt('bgmo123'),
            'rule_id' => 3,
            'office_id' => 8,
            'email_address' => 'bgmo@gmail.com',
            'phone_number' => '9973613510',
            ],
            [ 
            'name' => 'DR. ROGER M. MALAHAY',
            'email' => '202311CAS',
            'password' => bcrypt('cas123'),
            'rule_id' => 3,
            'office_id' => 11,
            'email_address' => 'cas@gmail.com',
            'phone_number' => '9973613510',
            ],
            [ 
            'name' => 'DR. DOMINIC M. LARIOSA',
            'email' => '202312CASHIER',
            'password' => bcrypt('casheir123'),
            'rule_id' => 3,
            'office_id' => 12,
            'email_address' => 'casheir@gmail.com',
            'phone_number' => '9973613510',
            ],
            [ 
            'name' => 'DR. EDEN GRACE VILLAFUERTE',
            'email' => '202325IGP',
            'password' => bcrypt('igp123'),
            'rule_id' => 3,
            'office_id' => 25,
            'email_address' => 'igp@gmail.com',
            'phone_number' => '9973613510',
            ],
            [ 
            'name' => 'DR. JOEL T. UBAT',
            'email' => '202333SAO',
            'password' => bcrypt('sao123'),
            'rule_id' => 3,
            'office_id' => 33,
            'email_address' => 'sao@gmail.com',
            'phone_number' => '9973613510',
            ],
            [ 
            'name' => 'PETMAR M. SAING',
            'email' => '202330REGISTRAR',
            'password' => bcrypt('registrar123'),
            'rule_id' => 3,
            'office_id' => 30,
            'email_address' => 'registrar@gmail.com',
            'phone_number' => '9973613510',
            ],
        ];

        User::insert($user);
    }
}
