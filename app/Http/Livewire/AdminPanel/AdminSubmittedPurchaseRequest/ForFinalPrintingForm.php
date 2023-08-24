<?php

namespace App\Http\Livewire\AdminPanel\AdminSubmittedPurchaseRequest;

use App\Models\PrNumber;
use App\Models\PurchaseRequest;
use App\Models\RequestCategory;
use Livewire\Component;

class ForFinalPrintingForm extends Component
{
    public  $purchase_request_number,
            $purchase_request_date,
            $request_category_id;
    public  $PurchaseRequestId;

    protected $listeners = [
        'PurchaseRequestId'
    ];

    public function PurchaseRequestId($PurchaseRequestId)
    {
        $this->PurchaseRequestId=$PurchaseRequestId;
    }

    public function render()
    {
        return view('livewire.admin-panel.admin-submitted-purchase-request.for-final-printing-form',[
            'RequestCategoryData' =>  RequestCategory::all()
        ]);
    }

    public function store()
    {

        $this->validate([
            'request_category_id'       => 'required'
        ]);
        date_default_timezone_set('Asia/Manila');
        $YearNow= date('Y') ;
        $PurchaseRequestData=PurchaseRequest::whereYear('created_at',$YearNow)->whereNotIn('pr_id',[''])->orderby('pr_id', 'desc')->first();
        // dd($PurchaseRequestData);
        $data = ([
            'pr_id'                     => ($PurchaseRequestData->pr_id ?? 0)+1,
            'purchase_request_date'     => date('Y-m-d'),
            'request_category_id'       => $this->request_category_id,
            'status_id'                 => 28
        ]);
        // dd($data);
        try {

            PurchaseRequest::find($this->PurchaseRequestId)->update($data);
            $this->emit('alert_update');

        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeForFinalPrintingModal');
        $this->emit('closeAdminSubmmitedPurchaseRequestModal');
        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function closeForFinalPrintingForm()
    {
        $this->emit('closeForFinalPrintingModal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
