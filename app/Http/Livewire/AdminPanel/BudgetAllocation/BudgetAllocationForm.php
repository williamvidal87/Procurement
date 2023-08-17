<?php

namespace App\Http\Livewire\AdminPanel\BudgetAllocation;

use App\Models\InsertBudget;
use App\Models\ItemCategory;
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
    
    public  $UserID;
    
    protected $listeners = ['editBudgetUtilizationData'];
    
    public function render()
    {
        return view('livewire.admin-panel.budget-allocation.budget-allocation-form',[
            'ItemCategoryData' =>  ItemCategory::all()
        ]);
    }

    public function editBudgetUtilizationData($user_id)
    {
        $this->emit('EmitTable');
        date_default_timezone_set('Asia/Manila');
        $YearNow= date('Y') ;
        $this->user_id=$user_id;
        $CheckExistInsertBudget=InsertBudget::whereYear('created_at',$YearNow)->where('user_id',$this->user_id)->first();
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
                ]);
                InsertBudget::create($data);
            }
        }
        
        $InsertBudgetData = InsertBudget::whereYear('created_at',$YearNow)->where('user_id',$this->user_id)->get();
        foreach ($InsertBudgetData as $index => $insertbudgetdata) {
            $this->insertBudgets[$index]=[
                'id'                    =>  $insertbudgetdata->id,
                'user_id'               =>  $insertbudgetdata->user_id,
                'item_category_id'      =>  $insertbudgetdata->item_category_id,
                'first_quarter'         =>  $insertbudgetdata->first_quarter,
                'second_quarter'        =>  $insertbudgetdata->second_quarter,
                'third_quarter'         =>  $insertbudgetdata->third_quarter,
                'fourth_quarter'        =>  $insertbudgetdata->fourth_quarter
            ];
        }
        
    }
    
    public function store()
    {
        
        $this->validate([
            'insertBudgets'                                     => 'array|required',
            'insertBudgets.*.first_quarter'                     => 'required',
            'insertBudgets.*.second_quarter'                    => 'required',
            'insertBudgets.*.third_quarter'                     => 'required',
            'insertBudgets.*.fourth_quarter'                    => 'required',
        ]);
        
        try {
            foreach ($this->insertBudgets as $index => $insertBudget) {
            
                $data = ([
                    'id'                    =>  $this->insertBudgets[$index]['id'],
                    'user_id'               =>  $this->insertBudgets[$index]['user_id'],
                    'item_category_id'      =>  $this->insertBudgets[$index]['item_category_id'],
                    'first_quarter'         =>  $this->insertBudgets[$index]['first_quarter'],
                    'second_quarter'        =>  $this->insertBudgets[$index]['second_quarter'],
                    'third_quarter'         =>  $this->insertBudgets[$index]['third_quarter'],
                    'fourth_quarter'        =>  $this->insertBudgets[$index]['fourth_quarter']
                ]);
                
                InsertBudget::find($this->insertBudgets[$index]['id'])->update($data);
            }
            
            $this->emit('alert_update');
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeBudgetUtilizationModal');
        $this->emit('refresh_budgetutilization_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeBudgetUtilizationForm(){
        $this->emit('closeBudgetUtilizationModal');
        $this->emit('refresh_budgetutilization_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
