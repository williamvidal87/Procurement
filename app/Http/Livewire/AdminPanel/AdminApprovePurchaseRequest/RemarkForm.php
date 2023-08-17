<?php

namespace App\Http\Livewire\AdminPanel\AdminApprovePurchaseRequest;

use App\Models\PurchaseRequest;
use Livewire\Component;

class RemarkForm extends Component
{
    public $remark;
    public $PurchaseRequestId;
    
    protected $listeners = [
        'PurchaseRequestId'
    ];
    
    public function PurchaseRequestId($PurchaseRequestId)
    {
        $this->PurchaseRequestId=$PurchaseRequestId;
    }
    
    public function render()
    {
        return view('livewire.admin-panel.admin-approve-purchase-request.remark-form');
    }
    
    public function YesRemark()
    {
        
        $data = ([
            'remark'                        => $this->remark,
            'status_id'                     => 2,
        ]);
        
        try {
            PurchaseRequest::find($this->PurchaseRequestId)->update($data);
            $this->emit('alert_update');
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->emit('closeRemarkModal');
        $this->emit('closeStatusModal');
        $this->emit('refresh_adminapprovepurchaserequest_table'); 
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        
    }
    
    public function NoRemark()
    {
        $this->emit('closeRemarkModal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
