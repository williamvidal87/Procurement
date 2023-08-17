<?php

namespace App\Http\Livewire\AdminPanel\AdminSubmittedPurchaseRequest;

use App\Models\InsertProcured;
use App\Models\ItemCategory;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;
use App\Models\Quarter;
use App\Models\User;
use Livewire\Component;

class AdminSubmittedPurchaseRequestForm extends Component
{
    public  $insertProcureds = [];
    public  $insert_procured_id = [],
            $quarter_id = [],
            $item_no = [],
            $unit_measure = [],
            $item_description = [],
            $qty = [],
            $estimated_cost = [];
    public  $estimated_cost_total;
    public  $total;
    public  $total_all;
    public  $InsertProcuredId;
    public  $ItemCategoryId,
            $QuarterId,
            $UserId;
    public  $documents = [];
    public  $temp_documents = [];
    public  $PurchaseRequestId;
    public  $purpose;
    
    protected $listeners = [
        'editAdminSubmmitedPurchaseRequestData'
    ];
    
    public function editAdminSubmmitedPurchaseRequestData($InsertProcuredId,$QuarterId)
    {
        $this->InsertProcuredId=$InsertProcuredId;
        $this->QuarterId=$QuarterId;
        $InsertProcuredData=InsertProcured::where('id',$this->InsertProcuredId)->first();
        $this->UserId=$InsertProcuredData->user_id;
        $this->ItemCategoryId=$InsertProcuredData->item_category_id;
        $PurchaseRequestItemData = PurchaseRequestItem::where('insert_procured_id',$this->InsertProcuredId)->where('quarter_id',$this->QuarterId)->get();
        
        foreach ($PurchaseRequestItemData as $index => $purchaseRequestItemData) {
            $this->insertProcureds[$index] = [
            'id'=>$purchaseRequestItemData['id'],
            'insert_procured_id'=>$purchaseRequestItemData['insert_procured_id'],
            'item_no' => $purchaseRequestItemData['item_no'],
            'unit_measure' => $purchaseRequestItemData['unit_measure'], 
            'item_description' => $purchaseRequestItemData['item_description'], 
            'qty' => $purchaseRequestItemData['qty'], 
            'estimated_cost' => $purchaseRequestItemData['estimated_cost']
            ];
        }
        
        $PurchaseRequestData=PurchaseRequest::where('insert_procured_id',$this->InsertProcuredId)->first();
        $this->documents = $PurchaseRequestData['document'];
        $this->documents= json_decode($this->documents , true);
        $this->PurchaseRequestId=$PurchaseRequestData['id'];
        $this->purpose=$PurchaseRequestData['purpose'];
    }
    
    public function render()
    {
        return view('livewire.admin-panel.admin-submitted-purchase-request.admin-submitted-purchase-request-form',[
            'UserData' =>  User::where('id',$this->UserId)->first(),
            'ItemCategoryData' =>  ItemCategory::where('id',$this->ItemCategoryId)->first(),
            'QuarterData' =>  Quarter::where('id',$this->QuarterId)->first()
        ])->with('getOffice');
    }
    
    public function Revise()
    {
        $this->emit('openRemarkModal');
        $this->emit('PurchaseRequestId',$this->PurchaseRequestId);
        
    }
    
    public function ForFinalPrinting()
    {
        $this->emit('openForFinalPrintingModal');
        $this->emit('PurchaseRequestId',$this->PurchaseRequestId);
    }
    
    public function closeAdminSubmmitedPurchaseRequestForm(){
        $this->emit('closeAdminSubmmitedPurchaseRequestModal');
        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
