<?php

namespace App\Http\Livewire\AdminPanel\AdminSubmittedPurchaseRequest;

use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminSubmittedPurchaseRequestTable extends Component
{
    protected $listeners = [
        'refresh_adminsubmitttedpurchaserequest_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.admin-submitted-purchase-request.admin-submitted-purchase-request-table',[
            'AdminSubmittedPurchaseRequestData' =>  PurchaseRequest::whereIn('status_id',[27,28,29])->get()
        ])->with('getInsertProcured','getQuarter','getStatus','getUser','getPrNumber');
    }

    public function editAdminSubmmitedPurchaseRequest($insert_procured_id,$quarter_id)
    {
        $this->emit('openAdminSubmmitedPurchaseRequestModal');
        $this->emit('editAdminSubmmitedPurchaseRequestData',$insert_procured_id,$quarter_id);
    }
    
    public function updateSvpStatus($PurchaseRequestId)
    {
        $this->emit('openSvpStatusModal');
        $this->emit('editSvpStatusData',$PurchaseRequestId);
    }
    
    public function updateCpbStatus($PurchaseRequestId)
    {
        $this->emit('openCpbStatusModal');
        $this->emit('editCpbStatusData',$PurchaseRequestId);
    }

}
