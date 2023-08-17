<?php

namespace App\Http\Livewire\AdminPanel\BudgetAllocation;

use App\Models\User;
use Livewire\Component;

class BudgetAllocationTable extends Component
{
    protected $listeners = [
        'refresh_budgetutilization_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.budget-allocation.budget-allocation-table',[
            'BudgetUtilizationData' =>  User::all()->whereIn('rule_id',[2,3])
        ])->with('getOffice');
    }

    public function editBudgetUtilization($UserID){
        $this->emit('openBudgetUtilizationModal');
        $this->emit('editBudgetUtilizationData',$UserID);
    }

    public function createBudgetUtilization(){
        $this->emit('openBudgetUtilizationModal');
    }

    public function deleteBudgetUtilization($UserID){
        $this->emit('openSwalDelete',$UserID);
    }

    public function DeleteData($UserID){
        User::destroy($UserID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
