<?php

namespace App\Http\Livewire\AdminPanel\AdminSubmittedPurchaseRequest;

use App\Models\PurchaseRequest;
use Livewire\Component;
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Throwable;

class UpdateCpbStatusForm extends Component
{
    public  $PurchaseRequestId;
    public  $pr_no,
            $pr_date;
    protected $listeners = [
        'editCpbStatusData'
    ];
    
    public function editCpbStatusData($PurchaseRequestId)
    {
        $this->PurchaseRequestId=$PurchaseRequestId;
        $DATA=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $this->pr_no = date_create_from_format("Y-m-d",$DATA->purchase_request_date)->format("Y-m-").$DATA->getPrNumber->pr_number;
        $this->pr_date = $DATA->purchase_request_date;
    }
    
    public function render()
    {
        return view('livewire.admin-panel.admin-submitted-purchase-request.update-cpb-status-form');
    }
    
    public function ApproveBudegetContract()
    {
        $data = ([
            'status_id'                     => 1,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeCpbStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Approval to For Approve Budget of Contract. Please check your dashboard for other details.";
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

        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function closeUpdateCpbForm()
    {
        $this->emit('closeCpbStatusModal');
        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
