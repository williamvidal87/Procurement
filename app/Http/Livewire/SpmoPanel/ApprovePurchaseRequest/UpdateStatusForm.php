<?php

namespace App\Http\Livewire\SpmoPanel\ApprovePurchaseRequest;

use App\Models\PurchaseRequest;
use Livewire\Component;

class UpdateStatusForm extends Component
{
    public  $PurchaseRequestId,
            $RequestCategoryId,
            $StatusId;
    public  $pr_no,
            $pr_date;
    protected $listeners = [
        'editStatusData'
    ];
    
    public function editStatusData($PurchaseRequestId,$RequestCategoryId,$StatusId)
    {
        $this->PurchaseRequestId=$PurchaseRequestId;
        $this->RequestCategoryId=$RequestCategoryId;
        $this->StatusId=$StatusId;
        $DATA=PurchaseRequest::find($this->PurchaseRequestId);
        $this->pr_no = $DATA['purchase_request_number'];
        $this->pr_date = $DATA['purchase_request_date'];
    }
    
    public function render()
    {
        return view('livewire.spmo-panel.approve-purchase-request.update-status-form');
    }
    
    public function ProjectImplementation()
    {
        $data = ([
            'status_id'                     => 15,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function ProjectCompleted()
    {
        $data = ([
            'status_id'                     => 16,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PurchaseOrder()
    {
        $data = ([
            'status_id'                     => 20,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PurchaseOrderApproval()
    {
        $data = ([
            'status_id'                     => 21,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function ApprovePurchaseOrder()
    {
        $data = ([
            'status_id'                     => 22,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function SupplierConforme()
    {
        $data = ([
            'status_id'                     => 23,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function Delivery()
    {
        $data = ([
            'status_id'                     => 24,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function CompletelyDelivered()
    {
        $data = ([
            'status_id'                     => 25,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeStatusForm()
    {
        $this->emit('closeStatusModal');
        $this->emit('refresh_approvepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
