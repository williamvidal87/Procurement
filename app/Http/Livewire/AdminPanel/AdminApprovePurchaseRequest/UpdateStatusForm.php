<?php

namespace App\Http\Livewire\AdminPanel\AdminApprovePurchaseRequest;

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
        return view('livewire.admin-panel.admin-approve-purchase-request.update-status-form');
    }
    
    //START SPB
    public function PreProcurement()
    {
        $data = ([
            'status_id'                     => 2,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PostingInvitation()
    {
        $data = ([
            'status_id'                     => 3,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PreBidConference()
    {
        $data = ([
            'status_id'                     => 4,
        ]);
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function BidOpeningEvaluation()
    {
        $data = ([
            'status_id'                     => 5,
        ]);
        
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function FailedBidding()
    {
        $this->emit('openRemarkModal');
        $this->emit('PurchaseRequestId',$this->PurchaseRequestId);
    }
    
    public function AbstractBids()
    {
        $data = ([
            'status_id'                     => 10,
        ]);
        
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PostQualification()
    {
        $data = ([
            'status_id'                     => 11,
        ]);
        
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function NoticeAward()
    {
        $data = ([
            'status_id'                     => 12,
        ]);
        
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function ContaractSigning()
    {
        $data = ([
            'status_id'                     => 13,
        ]);
        
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function NoticeProceed()
    {
        $data = ([
            'status_id'                     => 14,
        ]);
        
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    //END SPB
    
    
    //START SVP
    public function AbstractQuatation()
    {
        $data = ([
            'status_id'                     => 19,
        ]);
        
        PurchaseRequest::find($this->PurchaseRequestId)->update($data);
        $this->emit('alert_update');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeStatusForm()
    {
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
