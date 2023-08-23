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
    
        $this->emit('openPurchaseRequestModal');
        $this->emit('ItemCategoryId',$item_category_id,$quarter_id,$total_approve_budget);
    }
}
