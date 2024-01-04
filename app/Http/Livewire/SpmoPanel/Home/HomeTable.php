<?php

namespace App\Http\Livewire\SpmoPanel\Home;

use App\Models\InsertBudget;
use App\Models\InsertProcured;
use App\Models\ItemCategory;
use App\Models\OfficeItem;
use App\Models\PurchaseRequestItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Throwable;

class HomeTable extends Component
{
    public  $first_quarter_total,
            $second_quarter_total,
            $third_quarter_total,
            $fourth_quarter_total;
    public  $procure_first_quarter_total,
            $procure_second_quarter_total,
            $procure_third_quarter_total,
            $procure_fourth_quarter_total;
    public  $saving_first_quarter_total,
            $saving_second_quarter_total,
            $saving_third_quarter_total,
            $saving_fourth_quarter_total;
    public  $ExistData=0;
    public  $changeYear;

            protected $listeners = [
                'refresh_home_table' => '$refresh'
            ];

    public function render()
    {
        $this->emit('EmitTable');
        $YearNow=$this->changeYear;
        return view('livewire.spmo-panel.home.home-table',[
            'InsertBudgetData' =>  InsertBudget::where('year_budget',$YearNow)->where('user_id',Auth::user()->id)->get(),
            'OfficeItemData' =>  OfficeItem::where('status_id',33)->get(),
            'InsertProcuredData' => InsertProcured::where('year_budget',$YearNow)->where('user_id',Auth::user()->id)->get(),
            'years' => range(2023, strftime("%Y", time())+2),
        ])->with('getItemCategory');
    }

    public function mount()
    {
        $this->changeYear=strftime("%Y", time());
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
        $CheckExistInsertBudget=InsertBudget::where('year_budget',$YearNow)->where('user_id',Auth::user()->id)->first();
        if (empty($CheckExistInsertBudget)) {
            $ItemCategoryData = ItemCategory::all();
            foreach ($ItemCategoryData as $itemcategorydata) {
                $data = ([
                    'user_id'                       => Auth::user()->id,
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
    }


    public function createPurchaseRequest($insert_budget_id,$quarter_id,$total_approve_budget,$item_category_id)
    {
        $this->emit('openPurchaseRequestModal');
        $this->emit('InsertBudgetId',$insert_budget_id,$quarter_id,$total_approve_budget,$this->changeYear,$item_category_id);
    }
}
