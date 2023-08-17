<?php

namespace Database\Seeders;

use App\Models\PrNumber;
use Illuminate\Database\Seeder;

class PrNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PrNumber=[];
        
        for ($i=1; $i <= 1000; $i++) {
            if ($i<=9) {
                $PrNumber[$i]=[
                    'pr_number' => '000'.$i,
                ];
            }
            if ($i<=99&&$i>=10) {
                $PrNumber[$i]=[
                    'pr_number' => '00'.$i,
                ];
            }
            if ($i<=999&&$i>=100) {
                $PrNumber[$i]=[
                    'pr_number' => '0'.$i,
                ];
            }
            if ($i>=1000) {
                $PrNumber[$i]=[
                    'pr_number' => $i,
                ];
            }
        }
        foreach ($PrNumber as $key => $value) {
            PrNumber::insert([
                'pr_number' => $value['pr_number'],
            ]);
		}
    }
}
