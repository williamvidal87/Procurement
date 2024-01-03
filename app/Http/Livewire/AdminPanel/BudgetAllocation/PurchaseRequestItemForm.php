<?php

namespace App\Http\Livewire\AdminPanel\BudgetAllocation;

use App\Models\InsertBudget;
use App\Models\InsertProcured;
use App\Models\ItemCategory;
use App\Models\OfficeItem;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;
use App\Models\Quarter;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PurchaseRequestItemForm extends Component
{
    public  $insertBudgets = [];
    public  $insert_budget_id = [],
            $quarter_id = [],
            $item_no = [],
            $unit_measure = [],
            $item_description = [],
            $qty = [],
            $estimated_cost = [];
    public  $estimated_cost_total;
    public  $total;
    public  $total_all;
    public  $InsertBudgetId;
    public  $ItemCategoryId,
            $QuarterId,
            $total_approve_budget;
    public  $total_validation;
    public  $checkbox=[];
    public  $purchaseRequestId,
            $quarter;
    public  $UserId;
    public  $status_id;
    
    protected $listeners = [
        'PurchaseRequestItemId'
    ];
    
    public function addItem()
    {
        $this->insertBudgets[] = [
            'insert_budget_id'=>'',
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
        unset($this->insertBudgets[$index]);
        $this->insertBudgets = array_values($this->insertBudgets);
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PurchaseRequestItemId($purchaseRequestId,$quarter_id)
    {
        $this->purchaseRequestId=$purchaseRequestId;
        $this->quarter=$quarter_id;
        $this->QuarterId=$quarter_id;
        $PurchaseRequestData =  InsertBudget::where('id',$purchaseRequestId)->first();
        $this->ItemCategoryId=$PurchaseRequestData->item_category_id;
        $this->UserId=$PurchaseRequestData->user_id;
        $OfficeItemData=OfficeItem::where('insert_budget_id',$purchaseRequestId)->where('quarter_id',$quarter_id)->get();
        foreach ($OfficeItemData as $index =>   $purchaseRequestItemData) {
            $this->insertBudgets[$index] = [
            'quarter_id'=>$purchaseRequestItemData['quarter_id'],
            'item_no' => $purchaseRequestItemData['item_no'],
            'unit_measure' => $purchaseRequestItemData['unit_measure'], 
            'item_description' => $purchaseRequestItemData['item_description'], 
            'qty' => $purchaseRequestItemData['qty'], 
            'temp_qty' => $purchaseRequestItemData['qty'], 
            'estimated_cost' => $purchaseRequestItemData['estimated_cost'],
            'status_id' => $purchaseRequestItemData['status_id'],
            ];
        }
        $OfficeItemData2=OfficeItem::where('insert_budget_id',$purchaseRequestId)->where('quarter_id',$quarter_id)->first();
        $this->status_id=$OfficeItemData2->status_id ?? null;
    }
    
    public function render()
    {
        return view('livewire.admin-panel.budget-allocation.purchase-request-item-form',[
            'ItemCategoryData' =>  ItemCategory::where('id',$this->ItemCategoryId)->first(),
            'QuarterData' =>  Quarter::where('id',$this->quarter)->first(),
            'StatusData' =>  Status::whereIn('id',[33,34])->get(),
        ]);
    }
    
    
    public function store()
    {
        $this->validate([
            // 'insertBudgets'                                       => 'array|required',
            'insertBudgets.*.unit_measure'                        => 'required',
            'insertBudgets.*.item_description'                    => 'required',
            'insertBudgets.*.qty'                                 => 'required',
            'insertBudgets.*.estimated_cost'                      => 'required',
            'status_id'                                           => 'required',
        ]);
        
        try {
            OfficeItem::where('insert_budget_id', $this->purchaseRequestId)->delete(); // Delete all
            foreach ($this->insertBudgets as $index => $insertbudgeted) {
                    $data = ([
                        'insert_budget_id'              =>  $this->purchaseRequestId,
                        'quarter_id'                    =>  $this->QuarterId,
                        'user_id'                       =>  $this->UserId,
                        'category_id'                   =>  $this->ItemCategoryId,
                        'item_no'                       =>  $this->insertBudgets[$index]['item_no'],
                        'unit_measure'                  =>  $this->insertBudgets[$index]['unit_measure'],
                        'item_description'              =>  $this->insertBudgets[$index]['item_description'],
                        'qty'                           =>  $this->insertBudgets[$index]['qty'],
                        'estimated_cost'                =>  $this->insertBudgets[$index]['estimated_cost'],
                        'status_id'                     =>  $this->status_id
                    ]);
                        OfficeItem::create($data);
                    
            }
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
            InsertBudget::find($this->purchaseRequestId)->update($data2);
            
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
