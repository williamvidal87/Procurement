<?php

namespace App\Http\Livewire\AdminPanel\AdminSubmittedPurchaseRequest;

use App\Models\PrNumber;
use App\Models\PurchaseRequest;
use App\Models\RequestCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Throwable;

class ForFinalPrintingForm extends Component
{
    public  $purchase_request_number,
            $purchase_request_date,
            $request_category_id;
    public  $PurchaseRequestId;

    protected $listeners = [
        'PurchaseRequestId'
    ];

    public function PurchaseRequestId($PurchaseRequestId)
    {
        $this->PurchaseRequestId=$PurchaseRequestId;
    }

    public function render()
    {
        return view('livewire.admin-panel.admin-submitted-purchase-request.for-final-printing-form',[
            'RequestCategoryData' =>  RequestCategory::all()
        ]);
    }

    public function store()
    {

        $this->validate([
            'request_category_id'       => 'required'
        ]);
        date_default_timezone_set('Asia/Manila');
        $YearNow= date('Y') ;
        $PurchaseRequestData=PurchaseRequest::whereYear('created_at',$YearNow)->whereNotIn('pr_id',[''])->orderby('pr_id', 'desc')->first();
        
        $data = ([
            'pr_id'                     => ($PurchaseRequestData->pr_id ?? 0)+1,
            'purchase_request_date'     => date('Y-m-d'),
            'request_category_id'       => $this->request_category_id,
            'status_id'                 => 28
        ]);
        // dd($data);
        try {
            PurchaseRequest::find($this->PurchaseRequestId)->update($data);
            $this->emit('alert_update');

        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeForFinalPrintingModal');
        $this->emit('closeAdminSubmmitedPurchaseRequestModal');
        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        
            
        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;

        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');

        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For PR number to For Final Printing. Please check your dashboard for other details.";

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
            // echo("HTTP Code: " . $apiException->getCode() . "\n");
        }
        
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function closeForFinalPrintingForm()
    {
        $this->emit('closeForFinalPrintingModal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
