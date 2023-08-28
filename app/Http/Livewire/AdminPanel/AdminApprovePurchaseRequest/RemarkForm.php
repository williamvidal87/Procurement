<?php

namespace App\Http\Livewire\AdminPanel\AdminApprovePurchaseRequest;

use App\Models\PurchaseRequest;
use Livewire\Component;
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Throwable;

class RemarkForm extends Component
{
    public $remark;
    public $PurchaseRequestId;
    
    protected $listeners = [
        'PurchaseRequestId'
    ];
    
    public function PurchaseRequestId($PurchaseRequestId)
    {
        $this->PurchaseRequestId=$PurchaseRequestId;
    }
    
    public function render()
    {
        return view('livewire.admin-panel.admin-approve-purchase-request.remark-form');
    }
    
    public function YesRemark()
    {
        
        $data = ([
            'remark'                        => $this->remark,
            'status_id'                     => 4,
        ]);
        
        try {
            PurchaseRequest::find($this->PurchaseRequestId)->update($data);
            $this->emit('alert_update');
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->emit('closeRemarkModal');
        $this->emit('closeStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Bid Opening & Evaluation to For Pre-Bid Conference . Please check your dashboard for other details.";
        $configuration = new Configuration(host: $BASE_URL, apiKey: $API_KEY);
        $sendSmsApi = new SmsApi(config: $configuration);
        $destination = new SmsDestination(
            to: $RECIPIENT
        );
        $message = new SmsTextualMessage(destinations: [$destination], from: $SENDER, text: $MESSAGE_TEXT);
        $request = new SmsAdvancedTextualRequest(messages: [$message]);
        try {
            $smsResponse = $sendSmsApi->sendSmsMessage($request);

        } catch (Throwable $apiException) {
            echo("HTTP Code: " . $apiException->getCode() . "\n");
        }
        
        $this->emit('refresh_adminapprovepurchaserequest_table'); 
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        
    }
    
    public function NoRemark()
    {
        $this->emit('closeRemarkModal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
