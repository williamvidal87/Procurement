<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [

            //Competitive / Public Bidding (Total Amount: 1M and Above)

            [
            'status_name' => 'For Approve Budget of the Contract (ABC)',
            ],
            [
            'status_name' => 'For Pre-Procurement '
            ],
            [
            'status_name' => 'For Posting of Invitation to Bid & Bidding Documents'
            ],
            [
            'status_name' => 'For Pre-Bid Conference'
            ],
            [
            'status_name' => 'For Bid Opening & Evaluation'
            ],
            [
            'status_name' => 'Failed Bidding'
            ],
            [
            'status_name' => '2 Failed Bidding'
            ],
            [
            'status_name' => 'Negotiated Procurement'
            ],
            [
            'status_name' => 'Failed Request'
            ],
            [
            'status_name' => 'For Abstract of Bids'
            ],
            [
            'status_name' => 'For Post-Qualification'
            ],
            [
            'status_name' => 'For Notice of Award'
            ],
            [
            'status_name' => 'For Contract Signing'
            ],
            [
            'status_name' => 'For Notice to Proceed'
            ],
            [
            'status_name' => 'For Project Implementation'
            ],
            [
            'status_name' => 'Project Completed'
            ],

            //Small Value Procurement – SVP (Total Amount: 1M and Below)

            [
            'status_name' => 'For Local Canvassing'
            ],
            [
            'status_name' => 'For PhilGeps Posting'
            ],
            [
            'status_name' => 'For Abstract of Quotation'
            ],
            [
            'status_name' => 'For Purchase Order'
            ],
            [
            'status_name' => 'For Purchase Order Approval'
            ],
            [
            'status_name' => 'Approved Purchase Order'
            ],
            [
            'status_name' => 'For Suppliers Conforme'
            ],
            [
            'status_name' => 'For Delivery'
            ],
            [
            'status_name' => 'Completely Delivered'
            ],



            //Public Status

            [
            'status_name' => 'Pending'
            ],
            [
            'status_name' => 'For PR number' //gikan sa pending ilsan ug For PR number
            ],
            [
            'status_name' => 'For Final Printing'
            ],
            [
            'status_name' => 'For Approval'
            ],



            //Chat Message Status
            [
            'status_name' => 'Not Seen'
            ],
            [
            'status_name' => 'Seen'
            ],



            //Change Password
            [
            'status_name' => 'Password is Updated'
            ],



            //Insert Budget Status
            [
            'status_name' => 'Activate'
            ],
            [
            'status_name' => 'Deactivate'
            ],
        ];

        Status::insert($status);
    }
}
