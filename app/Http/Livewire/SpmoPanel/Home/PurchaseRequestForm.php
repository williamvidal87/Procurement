<?php

namespace App\Http\Livewire\SpmoPanel\Home;

use App\Models\InsertProcured;
use App\Models\ItemCategory;
use App\Models\OfficeItem;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;
use App\Models\Quarter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PurchaseRequestForm extends Component
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
    
    protected $listeners = [
        'ItemCategoryId'
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
    
    public function ItemCategoryId($ItemCategoryId,$QuarterId,$total_approve_budget)
    {
        $this->ItemCategoryId=$ItemCategoryId;
        $this->QuarterId=$QuarterId;
        $this->total_approve_budget=$total_approve_budget;
        date_default_timezone_set('Asia/Manila');
        $YearNow= date('Y') ;
        $CheckExistInsertProcured=InsertProcured::whereYear('created_at',$YearNow)->where('user_id',Auth::user()->id)->first();
        if (empty($CheckExistInsertProcured)) {
            $ItemCategoryData = ItemCategory::all();
            foreach ($ItemCategoryData as $itemcategorydata) {
                $data = ([
                    'user_id'                       => Auth::user()->id,
                    'item_category_id'              => $itemcategorydata->id,
                    'first_quarter'                 => 0,
                    'second_quarter'                => 0,
                    'third_quarter'                 => 0,
                    'fourth_quarter'                => 0,
                ]);
                InsertProcured::create($data);
            }
        }
        $InsertProcuredData = InsertProcured::whereYear('created_at',$YearNow)->where('user_id',Auth::user()->id)->where('item_category_id',$this->ItemCategoryId)->first();
        $this->InsertProcuredId=$InsertProcuredData->id;
        // $this->insertProcureds[0] = [
        //     'insert_procured_id'=>'',
        //     'quarter_id'=>'',
        //     'item_no'=>'',
        //     'unit_measure'=>'',
        //     'item_description'=>'',
        //     'qty'=> null,
        //     'estimated_cost'=> null,
        // ];
        
        $OfficeItemData=OfficeItem::where('quarter_id',$this->QuarterId)->where('user_id',Auth::user()->id)->where('category_id',$this->ItemCategoryId)->get();
        foreach ($OfficeItemData as $index =>   $purchaseRequestItemData) {
            $this->insertProcureds[$index] = [
            'id'=>$purchaseRequestItemData['id'],
            'quarter_id'=>$purchaseRequestItemData['quarter_id'],
            'insert_procured_id'=>$purchaseRequestItemData['insert_procured_id'],
            'item_no' => $purchaseRequestItemData['item_no'],
            'unit_measure' => $purchaseRequestItemData['unit_measure'], 
            'item_description' => $purchaseRequestItemData['item_description'], 
            'qty' => $purchaseRequestItemData['qty'], 
            'temp_qty' => $purchaseRequestItemData['qty'], 
            'estimated_cost' => $purchaseRequestItemData['estimated_cost'],
            'checkbox' => true
            ];
        }
    }
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.spmo-panel.home.purchase-request-form',[
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

        $this->emit('closePurchaseRequestModal');
        $this->emit('refresh_home_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    
    public function closePurchaseRequestForm(){
        $this->emit('closePurchaseRequestModal');
        $this->emit('refresh_home_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
