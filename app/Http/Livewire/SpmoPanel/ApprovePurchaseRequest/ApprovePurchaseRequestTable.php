<?php

namespace App\Http\Livewire\SpmoPanel\ApprovePurchaseRequest;

use App\Models\PurchaseRequest;
use Livewire\Component;

class ApprovePurchaseRequestTable extends Component
{
    protected $listeners = [
        'refresh_approvepurchaserequest_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.spmo-panel.approve-purchase-request.approve-purchase-request-table',[
            'PurchaseRequestData' =>  PurchaseRequest::whereIn('status_id',[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,17,18,19,20,21,22,23,24])->get()
        ])->with('getStatus','getPrNumber');
    }
    
    public function updateStatus($PurchaseRequestId,$RequestCategoryId,$StatusId)
    {
        $this->emit('openStatusModal');
        $this->emit('editStatusData',$PurchaseRequestId,$RequestCategoryId,$StatusId);
    }
}
