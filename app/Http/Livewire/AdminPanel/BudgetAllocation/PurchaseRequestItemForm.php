<?php

namespace App\Http\Livewire\AdminPanel\BudgetAllocation;

use App\Models\InsertBudget;
use App\Models\InsertProcured;
use App\Models\ItemCategory;
use App\Models\OfficeItem;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;
use App\Models\Quarter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PurchaseRequestItemForm extends Component
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
            $total_approve_budget;
    public  $total_validation;
    public  $checkbox=[];
    public  $purchaseRequestId,
            $quarter;
    
    protected $listeners = [
        'PurchaseRequestItemId'
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
    
    public function PurchaseRequestItemId($purchaseRequestId,$quarter_id)
    {
        $this->purchaseRequestId=$purchaseRequestId;
        $this->quarter=$quarter_id;
        $PurchaseRequestData =  InsertBudget::where('id',$purchaseRequestId)->first();
        $this->ItemCategoryId=$PurchaseRequestData->item_category_id;

    }
    
    public function render()
    {
        return view('livewire.admin-panel.budget-allocation.purchase-request-item-form',[
            'ItemCategoryData' =>  ItemCategory::where('id',$this->ItemCategoryId)->first(),
            'QuarterData' =>  Quarter::where('id',$this->quarter)->first(),
        ]);
    }
    
    
    public function store()
    {
        $this->validate([
            'insertProcureds'                                       => 'array|required',
            'insertProcureds.*.item_no'                             => 'required',
            'insertProcureds.*.unit_measure'                        => 'required',
            'insertProcureds.*.item_description'                    => 'required',
            'insertProcureds.*.qty'                                 => 'required',
            'insertProcureds.*.estimated_cost'                      => 'required',
        ]);
        try {
            foreach ($this->insertProcureds as $index => $insertprocured) {
                if ($this->insertProcureds[$index]['checkbox']==true) {
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
            }
            $this->QuarterId;
            if ($this->QuarterId==1) {
                $data2 = ([
                    'first_quarter'         =>  $this->total_all,
                ]);
            }
            if ($this->QuarterId==2) {
                $data2 = ([
                    'second_quarter'         =>  $this->total_all,
                ]);
            }
            if ($this->QuarterId==3) {
                $data2 = ([
                    'third_quarter'         =>  $this->total_all,
                ]);
            }
            if ($this->QuarterId==4) {
                $data2 = ([
                    'fourth_quarter'         =>  $this->total_all,
                ]);
            }
            InsertProcured::find($this->InsertProcuredId)->update($data2);
            $data3 = ([
                'user_id'               =>  Auth::user()->id,
                'insert_procured_id'    =>  $this->InsertProcuredId,
                'quarter_id'            =>  $this->QuarterId,
                'status_id'             =>  26,
            ]);
            PurchaseRequest::create($data3);
            
            $this->emit('alert_store');
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closePurchaseRequestItemModal');
        $this->emit('refresh_budget_allocation_form');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    
    public function closePurchaseRequestItemForm(){
        $this->emit('closePurchaseRequestItemModal');
        $this->emit('refresh_budget_allocation_form');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
