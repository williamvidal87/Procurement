<?php

namespace App\Http\Livewire\SpmoPanel\SubmittedPurchaseRequest;

use App\Models\InsertProcured;
use App\Models\ItemCategory;
use App\Models\PurchaseRequest;
use Livewire\Component;
use Livewire\WithFileUploads;

class AttachDocumentForm extends Component
{
    use WithFileUploads;
    
    public  $documents = [];
    public  $temp_documents = [];
    public  $purpose;
    public $PurchaseRequestId;
    protected $listeners = [
        'editAttachDocumentData'
    ];
    
    public function editAttachDocumentData($PurchaseRequestId)
    {
        $this->PurchaseRequestId=$PurchaseRequestId;
    }
    
    public function render()
    {
        return view('livewire.spmo-panel.submitted-purchase-request.attach-document-form');
    }
    
    
    public function store()
    {
        $this->validate([
            'documents'     => 'array|required',
            'documents.*'   => 'max:102400', // 1MB Max
            // 'purpose'       => 'required',
        ]);
        
        if($this->temp_documents!=$this->documents){
            foreach ($this->documents as $key => $letter) {
                $this->documents[$key] = $letter->store('documents');
            }
        }
        $this->documents = json_encode($this->documents);
        
        $PurchaseRequest=PurchaseRequest::where('id',$this->PurchaseRequestId)->get()->first();
        $InsertProcuredData=InsertProcured::where('id',$PurchaseRequest->insert_procured_id)->get()->first();
        
        
        $data = ([
            'document'                  => $this->documents,
            'status_id'                 => 27,
            'remark'                    => null,
            'purpose'                   => $InsertProcuredData->getUser->getOffice->office." ".$InsertProcuredData->getItemCategory->item_category,
        ]);
        
        try {
            PurchaseRequest::find($this->PurchaseRequestId)->update($data);
            $this->emit('alert_update');
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeAttachDocumentModal');
        $this->emit('refresh_submmitedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function closeAttachDocumentForm()
    {
        $this->emit('closeAttachDocumentModal');
        $this->emit('refresh_submmitedpurchaserequest_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
