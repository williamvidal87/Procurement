<?php

namespace App\Http\Livewire\AdminPanel\AdminSubmittedPurchaseRequest;

use App\Models\PurchaseRequest;
use Livewire\Component;

class UpdateCpbStatusForm extends Component
{
    public  $PurchaseRequestId;
    public  $pr_no,
            $pr_date;
    protected $listeners = [
        'editCpbStatusData'
    ];
    
    public function editCpbStatusData($PurchaseRequestId)
    {
    $this->PurchaseRequestId=$PurchaseRequestId;
    $DATA=PurchaseRequest::find($this->PurchaseRequestId);
    $this->pr_no = $DATA['purchase_request_number'];
    $this->pr_date = $DATA['purchase_request_date'];
    }
    
    public function render()
    {
        return view('livewire.admin-panel.admin-submitted-purchase-request.update-cpb-status-form');
    }
    
    public function ApproveBudegetContract()
    {
        $data = ([
            'status_id'                     => 1,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeCpbStatusModal');
        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function closeStatusForm()
    {
        $this->emit('closeCpbStatusModal');
        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
