<?php

namespace App\Http\Livewire\SpmoPanel\ApprovePurchaseRequest;

use App\Models\PurchaseRequest;
use Livewire\Component;
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Throwable;

class UpdateStatusForm extends Component
{
    public  $PurchaseRequestId,
            $RequestCategoryId,
            $StatusId;
    public  $pr_no,
            $pr_date;
    protected $listeners = [
        'editStatusData'
    ];
    
    public function editStatusData($PurchaseRequestId,$RequestCategoryId,$StatusId)
    {
        $this->PurchaseRequestId=$PurchaseRequestId;
        $this->RequestCategoryId=$RequestCategoryId;
        $this->StatusId=$StatusId;
        $DATA=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $this->pr_no = date_create_from_format("Y-m-d",$DATA->purchase_request_date)->format("Y-m-").$DATA->getPrNumber->pr_number;
        $this->pr_date = $DATA->purchase_request_date;
    }
    
    public function render()
    {
        return view('livewire.spmo-panel.approve-purchase-request.update-status-form');
    }
    
    public function ProjectImplementation()
    {
        $data = ([
            'status_id'                     => 15,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Notice to Proceed to For Project Implementation. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function ProjectCompleted()
    {
        $data = ([
            'status_id'                     => 16,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Project Implementation to Project Completed. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PurchaseOrder()
    {
        $data = ([
            'status_id'                     => 20,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Abstract of Quotation to For Purchase Order. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PurchaseOrderApproval()
    {
        $data = ([
            'status_id'                     => 21,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Purchase Order to For Purchase Order Approval. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function ApprovePurchaseOrder()
    {
        $data = ([
            'status_id'                     => 22,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Purchase Order Approval to Approved Purchase Order. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function SupplierConforme()
    {
        $data = ([
            'status_id'                     => 23,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from Approved Purchase Order to For Suppliers Conforme. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function Delivery()
    {
        $data = ([
            'status_id'                     => 24,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Suppliers Conforme to For Delivery. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function CompletelyDelivered()
    {
        $data = ([
            'status_id'                     => 25,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Delivery to Completely Delivered. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeStatusForm()
    {
        $this->emit('closeStatusModal');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
