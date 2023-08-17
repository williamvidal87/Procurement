<?php

namespace App\Http\Livewire\SpmoPanel\SubmittedPurchaseRequest;

use App\Models\InsertBudget;
use App\Models\InsertProcured;
use App\Models\ItemCategory;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;
use App\Models\Quarter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubmmitedPurchaseRequestForm extends Component
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
            $QuarterId;
    public  $total_approve_budget,
            $total_validation;
    
    protected $listeners = [
        'editSubmmitedPurchaseRequestData'
    ];
    
    public function addItem()
    {
        $this->insertProcureds[] = [
            'insert_procured_id'=>'',
            'quarter_id'=>'',
            'item_no'=>'',
            'unit_measure'=>'',
            'item_description'=>'',
            'qty'=> null,
            'estimated_cost'=> null,
        ];
        
    }

    public function removeItem($index)
    {   
        unset($this->insertProcureds[$index]);
        $this->insertProcureds = array_values($this->insertProcureds);
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function editSubmmitedPurchaseRequestData($InsertProcuredId,$QuarterId)
    {
        $this->emit('EmitTable');
        date_default_timezone_set('Asia/Manila');
        $YearNow= date('Y') ;
        $this->InsertProcuredId=$InsertProcuredId;
        $this->QuarterId=$QuarterId;
        $InsertProcuredData=InsertProcured::where('id',$this->InsertProcuredId)->first();
        $this->ItemCategoryId=$InsertProcuredData->item_category_id;
        $PurchaseRequestItemData = PurchaseRequestItem::where('insert_procured_id',$this->InsertProcuredId)->where('quarter_id',$this->QuarterId)->get();
        $InsertBudgetData=InsertBudget::whereYear('created_at',$YearNow)->where('user_id',$InsertProcuredData->user_id)->where('item_category_id',$InsertProcuredData->item_category_id)->first();
        if ($QuarterId==1) {
            $this->total_approve_budget=$InsertBudgetData->first_quarter;
        }
        if ($QuarterId==2) {
            $this->total_approve_budget=$InsertBudgetData->second_quarter;
        }
        if ($QuarterId==3) {
            $this->total_approve_budget=$InsertBudgetData->third_quarter;
        }
        if ($QuarterId==4) {
            $this->total_approve_budget=$InsertBudgetData->fourth_quarter;
        }
        
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
    }
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.spmo-panel.submitted-purchase-request.submmited-purchase-request-form',[
            'ItemCategoryData' =>  ItemCategory::where('id',$this->ItemCategoryId)->first(),
            'QuarterData' =>  Quarter::where('id',$this->QuarterId)->first()
        ]);
    }
    
    
    public function store()
    {
        $this->total_validation="lt:".$this->total_approve_budget+1;
        $this->validate([
            'insertProcureds'                                       => 'array|required',
            'insertProcureds.*.item_no'                             => 'required',
            'insertProcureds.*.unit_measure'                        => 'required',
            'insertProcureds.*.item_description'                    => 'required',
            'insertProcureds.*.qty'                                 => 'required',
            'insertProcureds.*.estimated_cost'                      => 'required',
            'total_all'                                             => $this->total_validation,
        ]);
        
        try {
            
                
            $PurchaseRequestItem=PurchaseRequestItem::where('insert_procured_id',$this->InsertProcuredId)->where('quarter_id',$this->QuarterId)->get();
            foreach ($PurchaseRequestItem as $purchaseRequestItem){
                PurchaseRequestItem::destroy($purchaseRequestItem['id']);
            }
            foreach ($this->insertProcureds as $index => $insertprocured) {
            
                $data = ([
                    'insert_procured_id'            =>  $this->InsertProcuredId,
                    'quarter_id'                    =>  $this->QuarterId,
                    'item_no'                       =>  $this->insertProcureds[$index]['item_no'],
                    'unit_measure'                  =>  $this->insertProcureds[$index]['unit_measure'],
                    'item_description'              =>  $this->insertProcureds[$index]['item_description'],
                    'qty'                           =>  $this->insertProcureds[$index]['qty'],
                    'estimated_cost'                =>  $this->insertProcureds[$index]['estimated_cost']
                ]);
                PurchaseRequestItem::create($data);
            }
            $data2 = ([
                'third_quarter'         =>  $this->total_all,
            ]);
            InsertProcured::find($this->InsertProcuredId)->update($data2);
            
            $this->emit('alert_update');
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeSubmmitedPurchaseRequestModal');
        $this->emit('refresh_submmitedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    
    
    public function closePurchaseRequestForm(){
        $this->emit('closeSubmmitedPurchaseRequestModal');
        $this->emit('refresh_submmitedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
