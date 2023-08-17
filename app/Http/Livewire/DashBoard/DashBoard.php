<?php

namespace App\Http\Livewire\DashBoard;

use App\Models\InsertBudget;
use App\Models\InsertProcured;
use Livewire\Component;

class DashBoard extends Component
{
    public  $totalapproveyear;
    public  $totalprocuredyear;
    public  $number_of_request;
    public  $ProcuredTotal=0;
    public  $RemainingTotal=0;
    
    public function render()
    {
        return view('livewire.dash-board.dash-board');
    }
    
    public function mount()
    {
        date_default_timezone_set('Asia/Manila');
        $YearNow= date('Y') ;
        $InsertBudget=InsertBudget::whereYear('created_at',$YearNow)->get();
        $totalapproveyear=0;
        foreach ($InsertBudget as $insertBudget) {
                $totalapproveyear+=$insertBudget->second_quarter+$insertBudget->third_quarter+$insertBudget->fourth_quarter+$insertBudget->first_quarter;
        }
        $this->totalapproveyear=$totalapproveyear;
        $totalprocuredyear=0;
        $InsertProcured=InsertProcured::whereYear('created_at',$YearNow)->get();
        foreach ($InsertProcured as $insertProcured) {
                $totalprocuredyear+=$insertProcured->second_quarter+$insertProcured->third_quarter+$insertProcured->fourth_quarter+$insertProcured->first_quarter;
        }
        if ($totalprocuredyear!=0&&$totalapproveyear!=0) {
            $this->totalprocuredyear=$totalprocuredyear;
            $this->ProcuredTotal=($totalprocuredyear/$totalapproveyear)*100;
            $this->RemainingTotal=100-$this->ProcuredTotal;
        }
        
    }
}
