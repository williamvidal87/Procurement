<?php

namespace App\Http\Livewire\SpmoPanel\Home;

use App\Models\InsertBudget;
use App\Models\InsertProcured;
use App\Models\PurchaseRequestItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Throwable;

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
    
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".Auth::user()->phone_number;
        $MESSAGE_TEXT = "Sample Procurment";
        
        $configuration = new Configuration(host: $BASE_URL, apiKey: $API_KEY);
        
        $sendSmsApi = new SmsApi(config: $configuration);
        
        $destination = new SmsDestination(
            to: $RECIPIENT
        );
        
        $message = new SmsTextualMessage(destinations: [$destination], from: $SENDER, text: $MESSAGE_TEXT);
        
        $request = new SmsAdvancedTextualRequest(messages: [$message]);
        
        try {
            $smsResponse = $sendSmsApi->sendSmsMessage($request);
        
            echo $smsResponse->getBulkId() . PHP_EOL;
        
            foreach ($smsResponse->getMessages() ?? [] as $message) {
                echo sprintf('Message ID: %s, status: %s', $message->getMessageId(), $message->getStatus()?->getName()) . PHP_EOL;
            }
        } catch (Throwable $apiException) {
            echo("HTTP Code: " . $apiException->getCode() . "\n");
        }
    
    
    
    
        $this->emit('openPurchaseRequestModal');
        $this->emit('ItemCategoryId',$item_category_id,$quarter_id,$total_approve_budget);
    }
}
