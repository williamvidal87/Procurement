<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $office = [
            [ 
            'office' => 'ACA-ACADEMICS (Assistant Campus Administrator - Academics)',
            ],
            [ 
            'office' => 'ACA-ADMIN (Assistant Campus Administrator - Administration)'
            ],
            [ 
            'office' => 'ACCOUNTING'
            ],
            [ 
            'office' => 'ADMIN(Campus Administrators Office)'
            ],
            [ 
            'office' => 'ALUMNI-AFFAIRS'
            ],
            [ 
            'office' => 'BAC (Bids and Awards Committee - Chairman & Members)'
            ],
            [ 
            'office' => 'BAC SEC (Secretariat of the Bids and Awards Committee)'
            ],
            [ 
            'office' => 'BGMO (Buildings and Grounds Maintenance Office)'
            ],
            [ 
            'office' => 'CAFF (College of Agriculture, Forestry and Fishery)'
            ],
            [ 
            'office' => 'CARE Center'
            ],
            [ 
            'office' => 'CAS (College of Arts and Sciences)'
            ],
            [ 
            'office' => 'CASHIER / DISBURSING'
            ],
            [ 
            'office' => 'CBA (College of Business Administration)'
            ],
            [ 
            'office' => 'CCJE (College of Criminal Justice Education)'
            ],
            [ 
            'office' => 'CIT (College of Industrial Technology)'
            ],
            [ 
            'office' => 'CLINIC'
            ],
            [ 
            'office' => 'CLONAL (Clonal Technician)'
            ],
            [ 
            'office' => 'CTE (College of Teacher Education)'
            ],
            [ 
            'office' => 'CULTURAL'
            ],
            [ 
            'office' => 'EXTENSION'
            ],
            [ 
            'office' => 'GAD (Gender and Development)'
            ],
            [ 
            'office' => 'GSO (General Services Office - Electrical, Motorpool, & Janitorial)'
            ],
            [ 
            'office' => 'HRMO'
            ],
            [ 
            'office' => 'ICTO (Information and Communication Technology Office)'
            ],
            [ 
            'office' => 'IGP'
            ],
            [ 
            'office' => 'LIBRARY'
            ],
            [ 
            'office' => 'NSTP'
            ],
            [ 
            'office' => 'PE'
            ],
            [ 
            'office' => 'PLANNING'
            ],
            [ 
            'office' => 'REGISTRAR'
            ],
            [ 
            'office' => 'RESEARCH'
            ],
            [ 
            'office' => 'SAFETY COMPLIANCE OFFICE'
            ],
            [ 
            'office' => 'SAO (Student Affairs Office)'
            ],
            [ 
            'office' => 'SG (Student Government)'
            ],
            [ 
            'office' => 'SPMO (Supply & Property Management Office)'
            ],
            [ 
            'office' => 'TN (The NORSUNIAN)'
            ],
            [ 
            'office' => 'USMO (University Security Management Office)'
            ],
        ];

        Office::insert($office);
    }
}
