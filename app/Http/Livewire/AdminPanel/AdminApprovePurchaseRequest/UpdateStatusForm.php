<?php

namespace App\Http\Livewire\AdminPanel\AdminApprovePurchaseRequest;

use App\Models\PurchaseRequest;
use App\Models\Status;
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
        return view('livewire.admin-panel.admin-approve-purchase-request.update-status-form');
    }
    
    //START SPB
    public function PreProcurement()
    {
        $data = ([
            'status_id'                     => 2,
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
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Approve Budget of the Contract to For Pre-Procurement. Please check your dashboard for other details.";
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

        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PostingInvitation()
    {
        $data = ([
            'status_id'                     => 3,
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
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Pre-Procurement to For Posting of Invitation to Bid & Bidding Documents. Please check your dashboard for other details.";
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

        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PreBidConference()
    {
        $data = ([
            'status_id'                     => 4,
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
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Posting of Invitation to Bid & Bidding Documents to For Pre-Bid Conference. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function BidOpeningEvaluation()
    {
        $data = ([
            'status_id'                     => 5,
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
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Pre-Bid Conference to For Bid Opening & Evaluation. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function FailedBidding()
    {
        $this->emit('openRemarkModal');
        $this->emit('PurchaseRequestId',$this->PurchaseRequestId);
    }
    
    public function AbstractBids()
    {
        $data = ([
            'status_id'                     => 10,
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
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Bid Opening & Evaluation to For Abstract of Bids. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PostQualification()
    {
        $data = ([
            'status_id'                     => 11,
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
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Abstract of Bids to For Post-Qualification. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function NoticeAward()
    {
        $data = ([
            'status_id'                     => 12,
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
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Post-Qualification to For Notice of Award. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function ContaractSigning()
    {
        $data = ([
            'status_id'                     => 13,
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
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Notice of Award to For Contract Signing. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function NoticeProceed()
    {
        $data = ([
            'status_id'                     => 14,
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
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from For Contract Signing to For Notice to Proceed. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    //END SPB
    
    
    //START SVP
    public function AbstractQuatation()
    {
        $data = ([
            'status_id'                     => 19,
        ]);
        
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');

        $show_PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $show_PrNumber=$show_PurchaseRequest->getPrNumber->pr_number;
        $show_status=Status::where('id',$this->StatusId)->get()->first();
        $BASE_URL = env('BASE_URL');
        $API_KEY = env('API_KEY');
        $SENDER = "InfoSMS";
        $RECIPIENT = "63".$show_PurchaseRequest->getUser->phone_number;
        $MESSAGE_TEXT = "Request with PR Number: ".date('Y-m-').$show_PrNumber.", has been updated from ".$show_status->status_name." to For Abstract of Quotation. Please check your dashboard for other details.";
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
        
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeStatusForm()
    {
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
