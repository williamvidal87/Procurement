<?php

namespace App\Http\Livewire\AdminPanel\BudgetUtilization;

use App\Models\InsertProcured;
use App\Models\ItemCategory;
use App\Models\User;
use Livewire\Component;

class BudgetUtilizationForm extends Component
{
    public  $data = [];
    public  $user_id;
    public  $insertProcureds = [];
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
        return view('livewire.admin-panel.budget-utilization.budget-utilization-form',[
            'ItemCategoryData' =>  ItemCategory::all()
        ]);
    }

    public function editBudgetUtilizationData($user_id)
    {
        $this->emit('EmitTable');
        date_default_timezone_set('Asia/Manila');
        $YearNow= date('Y') ;
        $this->user_id=$user_id;
        $CheckExistInsertProcured=InsertProcured::whereYear('created_at',$YearNow)->where('user_id',$this->user_id)->first();
        if (empty($CheckExistInsertProcured)) {
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
                InsertProcured::create($data);
            }
        }
        
        $InsertProcuredData = InsertProcured::whereYear('created_at',$YearNow)->where('user_id',$this->user_id)->get();
        foreach ($InsertProcuredData as $index => $insertprocureddata) {
            $this->insertProcureds[$index]=[
                'id'                    =>  $insertprocureddata->id,
                'user_id'               =>  $insertprocureddata->user_id,
                'item_category_id'      =>  $insertprocureddata->item_category_id,
                'first_quarter'         =>  $insertprocureddata->first_quarter,
                'second_quarter'        =>  $insertprocureddata->second_quarter,
                'third_quarter'         =>  $insertprocureddata->third_quarter,
                'fourth_quarter'        =>  $insertprocureddata->fourth_quarter
            ];
        }
        
    }
    
    public function store()
    {
        
        $this->validate([
            'insertProcureds'                                     => 'array|required',
            'insertProcureds.*.first_quarter'                     => 'required',
            'insertProcureds.*.second_quarter'                    => 'required',
            'insertProcureds.*.third_quarter'                     => 'required',
            'insertProcureds.*.fourth_quarter'                    => 'required',
        ]);
        
        try {
            foreach ($this->insertProcureds as $index => $insertprocured) {
            
                $data = ([
                    'id'                    =>  $this->insertProcureds[$index]['id'],
                    'user_id'               =>  $this->insertProcureds[$index]['user_id'],
                    'item_category_id'      =>  $this->insertProcureds[$index]['item_category_id'],
                    'first_quarter'         =>  $this->insertProcureds[$index]['first_quarter'],
                    'second_quarter'        =>  $this->insertProcureds[$index]['second_quarter'],
                    'third_quarter'         =>  $this->insertProcureds[$index]['third_quarter'],
                    'fourth_quarter'        =>  $this->insertProcureds[$index]['fourth_quarter']
                ]);
                
                InsertProcured::find($this->insertProcureds[$index]['id'])->update($data);
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
