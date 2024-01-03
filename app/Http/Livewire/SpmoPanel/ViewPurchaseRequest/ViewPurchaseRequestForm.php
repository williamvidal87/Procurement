<?php

namespace App\Http\Livewire\SpmoPanel\ViewPurchaseRequest;

use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;
use Livewire\Component;

class ViewPurchaseRequestForm extends Component
{
    public  $PurchaseRequestId;
    public  $UserData,
            $office,
            $pr_no,
            $pr_date,
            $purpose;
    public  $InsertProcured;
    protected $listeners = [
        'ViewPuchaseRequestData'
    ];

    public function ViewPuchaseRequestData($PurchaseRequestId)
    {
        $this->PurchaseRequestId=$PurchaseRequestId;
        $this->UserData=PurchaseRequest::where('id',$this->PurchaseRequestId)->first();
        $this->office=$this->UserData->getUser->getOffice->office;
        $this->InsertProcured=$this->UserData->insert_procured_id;
        if ($this->UserData->purchase_request_date) {
            $this->pr_no=date_create_from_format("Y-m-d",$this->UserData->purchase_request_date)->format("Y-m-").$this->UserData->getPrNumber->pr_number;
        }
        $this->pr_date=$this->UserData->purchase_request_date;
        $this->purpose=$this->UserData->getUser->getOffice->office." ".$this->UserData->getInsertProcured->getItemCategory->item_category;
    }

    public function render()
    {
        return view('livewire.spmo-panel.view-purchase-request.view-purchase-request-form',[
            'office' => $this->office,
            'pr_no' => $this->pr_no,
            'pr_date' => $this->pr_date,
            'PurchaseRequestItem' => PurchaseRequestItem::where('insert_procured_id',$this->InsertProcured)->get(),
            'total_all' => 0,
            'purpose' => $this->purpose,
            'UserName' => $this->UserData->getUser->name ?? "none",
            'Office' => $this->UserData->getUser->getOffice->office ?? "none"
        ]);
    }

    public function closeViewPuchaseRequestForm()
    {
        $this->emit('closeViewPuchaseRequestModal');
        $this->emit('refresh_submmitedpurchaserequest_table');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        $this->reset(); 
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
