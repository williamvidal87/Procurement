<?php

namespace App\Http\Livewire\AdminPanel\AdminApprovePurchaseRequest;

use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminApprovePurchaseRequestTable extends Component
{
    protected $listeners = [
        'refresh_adminapprovepurchaserequest_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.admin-approve-purchase-request.admin-approve-purchase-request-table',[
            'PurchaseRequestData' =>  PurchaseRequest::whereIn('status_id',[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,17,18,19,20,21,22,23,24])->get()
        ])->with('getStatus','getPrNumber');
    }
    
    public function updateStatus($PurchaseRequestId,$RequestCategoryId,$StatusId)
    {
        $this->emit('openStatusModal');
        $this->emit('editStatusData',$PurchaseRequestId,$RequestCategoryId,$StatusId);
    }

    public function ViewPurchaseRequest($PurchaseRequestId)
    {
        $this->emit('openViewPuchaseRequestModal');
        $this->emit('ViewPuchaseRequestData',$PurchaseRequestId);
    }
}
