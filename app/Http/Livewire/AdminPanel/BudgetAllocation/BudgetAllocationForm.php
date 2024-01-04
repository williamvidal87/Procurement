<?php

namespace App\Http\Livewire\AdminPanel\BudgetAllocation;

use App\Models\InsertBudget;
use App\Models\InsertProcured;
use App\Models\ItemCategory;
use App\Models\OfficeItem;
use Livewire\Component;

class BudgetAllocationForm extends Component
{
    public  $data = [];
    public  $user_id;
    public  $insertBudgets = [];
    public  $first_quarter = [],
            $second_quarter = [],
            $third_quarter = [],
            $fourth_quarter = [];
            
    public  $first_quarter_total = 0,
            $second_quarter_total = 0,
            $third_quarter_total = 0,
            $fourth_quarter_total = 0;
    public  $changeYear;
    public  $UserID;
    
    protected $listeners = [
        'editBudgetUtilizationData',
        'refresh_budget_allocation_form' => '$refresh',
    ];
    
    public function render()
    {
        $YearNow=$this->changeYear;
        return view('livewire.admin-panel.budget-allocation.budget-allocation-form',[
            'ItemCategoryData' =>  ItemCategory::all(),
            'OfficeItemData' =>  OfficeItem::all(),
            'years' => range(2023, strftime("%Y", time())+2),
            'InsertBudgetData' => InsertBudget::where('year_budget',$YearNow)->where('user_id',$this->user_id)->get(),
            'InsertProcuredData' => InsertProcured::where('year_budget',$YearNow)->where('user_id',$this->user_id)->get()
        ])->with('getItemCategory');
    }

    public function createPurchaseRequestItem($purchaseRequestId,$quarter_id)
    {
        $this->emit('openPurchaseRequestItemModal');
        $this->emit('PurchaseRequestItemId',$purchaseRequestId,$quarter_id);
    }

    public function doSomething()
    {
        unset($data);
        unset($insertBudgets);
        unset($first_quarter);
        unset($second_quarter);
        unset($third_quarter);
        unset($fourth_quarter);
        $YearNow=$this->changeYear;
        $CheckExistInsertBudget=InsertBudget::where('year_budget',$YearNow)->where('user_id',$this->user_id)->first();
        if (empty($CheckExistInsertBudget)) {
            $ItemCategoryData = ItemCategory::all();
            foreach ($ItemCategoryData as $itemcategorydata) {
                $data = ([
                    'user_id'                       => $this->user_id,
                    'item_category_id'              => $itemcategorydata->id,
                    'first_quarter'                 => 0,
                    'second_quarter'                => 0,
                    'third_quarter'                 => 0,
                    'fourth_quarter'                => 0,
                    'year_budget'                   => $YearNow,
                ]);
                InsertBudget::create($data);
            }
        }
        
        // $InsertBudgetData = InsertBudget::where('year_budget',$YearNow)->where('user_id',$this->user_id)->get();
        // foreach ($this->InsertBudgetData as $index => $insertbudgetdata) {
        //     $this->insertBudgets[$index]=[
        //         'id'                    =>  $insertbudgetdata->id,
        //         'user_id'               =>  $insertbudgetdata->user_id,
        //         'item_category_id'      =>  $insertbudgetdata->item_category_id,
        //         'first_quarter'         =>  $insertbudgetdata->first_quarter,
        //         'second_quarter'        =>  $insertbudgetdata->second_quarter,
        //         'third_quarter'         =>  $insertbudgetdata->third_quarter,
        //         'fourth_quarter'        =>  $insertbudgetdata->fourth_quarter
        //     ];
        // }

    }

    public function editBudgetUtilizationData($user_id)
    {
        $this->emit('EmitTable');
        $this->changeYear=strftime("%Y", time());
        $YearNow= $this->changeYear;
        $this->user_id=$user_id;
        $CheckExistInsertBudget=InsertBudget::where('year_budget',$YearNow)->where('user_id',$this->user_id)->first();
        if (empty($CheckExistInsertBudget)) {
            $ItemCategoryData = ItemCategory::all();
            foreach ($ItemCategoryData as $itemcategorydata) {
                $data = ([
                    'user_id'                       => $this->user_id,
                    'item_category_id'              => $itemcategorydata->id,
                    'first_quarter'                 => 0,
                    'second_quarter'                => 0,
                    'third_quarter'                 => 0,
                    'fourth_quarter'                => 0,
                    'year_budget'                   => $YearNow,
                ]);
                InsertBudget::create($data);
            }
        }
        
        // $InsertBudgetData = InsertBudget::where('year_budget',$YearNow)->where('user_id',$this->user_id)->get();
        // foreach ($this->InsertBudgetData as $index => $insertbudgetdata) {
        //     $this->insertBudgets[$index]=[
        //         'id'                    =>  $insertbudgetdata->id,
        //         'user_id'               =>  $insertbudgetdata->user_id,
        //         'item_category_id'      =>  $insertbudgetdata->item_category_id,
        //         'first_quarter'         =>  $insertbudgetdata->first_quarter,
        //         'second_quarter'        =>  $insertbudgetdata->second_quarter,
        //         'third_quarter'         =>  $insertbudgetdata->third_quarter,
        //         'fourth_quarter'        =>  $insertbudgetdata->fourth_quarter
        //     ];
        // }
        
    }
    
    
    public function closeBudgetUtilizationForm(){
        $this->emit('closeBudgetUtilizationModal');
        $this->emit('refresh_budgetutilization_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
