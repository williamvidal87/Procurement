<?php

namespace App\Http\Livewire\AdminPanel\AdminSubmittedPurchaseRequest;

use App\Models\PurchaseRequest;
use Livewire\Component;

class UpdateSvpStatusForm extends Component
{
    public  $PurchaseRequestId;
    public  $pr_no,
            $pr_date;
    protected $listeners = [
        'editSvpStatusData'
    ];
    
    public function editSvpStatusData($PurchaseRequestId)
    {
    $this->PurchaseRequestId=$PurchaseRequestId;
    $DATA=PurchaseRequest::find($this->PurchaseRequestId);
    $this->pr_no = $DATA['purchase_request_number'];
    $this->pr_date = $DATA['purchase_request_date'];
    }
    
    public function render()
    {
        return view('livewire.admin-panel.admin-submitted-purchase-request.update-svp-status-form');
    }
    
    public function LocalCanvasing()
    {
        $data = ([
            'status_id'                     => 17,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeSvpStatusModal');
        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PhilgepsPosting()
    {
        $data = ([
            'status_id'                     => 18,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeSvpStatusModal');
        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function closeUpdateSvpForm()
    {
        $this->emit('closeSvpStatusModal');
        $this->emit('refresh_adminsubmitttedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
