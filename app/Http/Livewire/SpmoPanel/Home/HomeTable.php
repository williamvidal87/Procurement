<?php

namespace App\Http\Livewire\SpmoPanel\Home;

use App\Models\InsertBudget;
use App\Models\InsertProcured;
use App\Models\PurchaseRequestItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeTable extends Component
{
    public  $first_quarter_total,
            $second_quarter_total,
            $third_quarter_total,
            $fourth_quarter_total;
    public  $procure_first_quarter_total,
            $procure_second_quarter_total,
            $procure_third_quarter_total,
            $procure_fourth_quarter_total;
    public  $saving_first_quarter_total,
            $saving_second_quarter_total,
            $saving_third_quarter_total,
            $saving_fourth_quarter_total;
    public  $ExistData=0;
            
            protected $listeners = [
                'refresh_home_table' => '$refresh'
            ];
            
    public function render()
    {
        $this->emit('EmitTable');
        date_default_timezone_set('Asia/Manila');
        $YearNow= date('Y') ;
        return view('livewire.spmo-panel.home.home-table',[
            'InsertBudgetData' =>  InsertBudget::whereYear('created_at',$YearNow)->where('user_id',Auth::user()->id)->get(),
            'InsertProcuredData' => InsertProcured::whereYear('created_at',$YearNow)->where('user_id',Auth::user()->id)->get(),
            'PurchaseRequestItemData' => PurchaseRequestItem::all()
        ])->with('getItemCategory');
    }
    
    
    public function createPurchaseRequest($item_category_id,$quarter_id,$total_approve_budget)
    {
        // $basic  = new \Vonage\Client\Credentials\Basic("e84d79f8", "EmUbN8mSqDbjfiq4");
        // $client = new \Vonage\Client($basic);
        
        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS("639973613510", "Procurement", 'sample notify')
        // );
        
        // $message = $response->current();
        
        // if ($message->getStatus() == 0) {
        //     dd( "The message was sent successfully\n");
        // } else {
        //     dd( "The message failed with status: " . $message->getStatus() . "\n");
        // }
        
        
        // Authorisation details.
    	$username = "williamvidal652@gmail.com";
    	$hash = "480a3b4b52e754a6a83b047ec8d5f3905f3f7876b390a374ed035106ffd913de";
    
    	// Config variables. Consult http://api.txtlocal.com/docs for more info.
    	$test = "0";
    
    	// Data for text message. This is the text message data.
    	$sender = "API Test"; // This is who the message appears to be from.
    	$numbers = "09212969669"; // A single number or a comma-seperated list of numbers
    	$message = "This is a test message from the PHP API script.";
    	// 612 chars or less
    	// A single number or a comma-seperated list of numbers
    	$message = urlencode($message);
    	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    	$ch = curl_init('https://api.txtlocal.com/send/?');
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$result = curl_exec($ch); // This is the result from the API
    	curl_close($ch);
        
        
        
    
        $this->emit('openPurchaseRequestModal');
        $this->emit('ItemCategoryId',$item_category_id,$quarter_id,$total_approve_budget);
    }
}
