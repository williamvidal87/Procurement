<?php

namespace App\Http\Livewire\AdminPanel\ProcurementReport;

use App\Models\InsertBudget;
use App\Models\InsertProcured;
use App\Models\ItemCategory;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProcurementReportTable extends Component
{
    public  $first_quarter,
            $second_quarter,
            $third_quarter,
            $fourth_quarter;
    public  $first_quarter_total,
            $second_quarter_total,
            $third_quarter_total,
            $fourth_quarter_total;
    public  $procured_first_quarter_total,
            $procured_second_quarter_total,
            $procured_third_quarter_total,
            $procured_fourth_quarter_total;
    public  $savings_first_quarter_total,
            $savings_second_quarter_total,
            $savings_third_quarter_total,
            $savings_fourth_quarter_total;
    public  $number_of_request;
    public  $ProcuredTotal=0;
    public  $RemainingTotal=0;
    public  $Guihulngan_Budget=0;
            
            protected $listeners = [
                'refresh_home_table' => '$refresh'
            ];
            
    public function render()
    {
        $this->emit('EmitTable');
        date_default_timezone_set('Asia/Manila');
        $YearNow= date('Y') ;
        return view('livewire.admin-panel.procurement-report.procurement-report-table',[
            'ItemCategory' =>  ItemCategory::all(),
            'InsertBudgetData' =>  InsertBudget::whereYear('created_at',$YearNow)->get(),
            'InsertProcuredData' => InsertProcured::whereYear('created_at',$YearNow)->get(),
            'PurchaseRequestItemData' => PurchaseRequestItem::all(),
            'UserData' =>  User::whereIn('rule_id',[2,3])->get(),
            'PurchaseRequestData' =>  PurchaseRequest::whereYear('created_at',$YearNow)->get(),
            'OfficeSuppliesData' =>  InsertProcured::whereYear('created_at',$YearNow)->where('item_category_id',1)->get(),
            'OfficeEquipmentData' =>  InsertProcured::whereYear('created_at',$YearNow)->where('item_category_id',2)->get(),
            'InfrastructureData' =>  InsertProcured::whereYear('created_at',$YearNow)->where('item_category_id',3)->get(),
            'RepairsMaintenanceData' =>  InsertProcured::whereYear('created_at',$YearNow)->where('item_category_id',4)->get(),
            'FurnitureFixtureData' =>  InsertProcured::whereYear('created_at',$YearNow)->where('item_category_id',5)->get(),
            'OthersData' =>  InsertProcured::whereYear('created_at',$YearNow)->where('item_category_id',6)->get()
        ])->with('getItemCategory','getOffice');
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
        $this->Guihulngan_Budget=$totalapproveyear;
        $totalprocuredyear=0;
        $InsertProcured=InsertProcured::whereYear('created_at',$YearNow)->get();
        foreach ($InsertProcured as $insertProcured) {
                $totalprocuredyear+=$insertProcured->second_quarter+$insertProcured->third_quarter+$insertProcured->fourth_quarter+$insertProcured->first_quarter;
        }
        $this->ProcuredTotal=($totalprocuredyear/$totalapproveyear)*100;
        $this->RemainingTotal=100-$this->ProcuredTotal;
        
    }
}