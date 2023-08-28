<?php

namespace App\Http\Livewire\SpmoPanel\SubmittedPurchaseRequest;

use App\Models\InsertProcured;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SubmmitedPurchaseRequestTable extends Component
{
    protected $listeners = [
        'refresh_submmitedpurchaserequest_table' => '$refresh'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.spmo-panel.submitted-purchase-request.submmited-purchase-request-table',[
            'SubmmitedPurchaseRequestData' =>  PurchaseRequest::where('user_id',Auth::user()->id)->whereIn('status_id',[26,27,28,29])->get()
        ])->with('getInsertProcured','getQuarter','getStatus');
    }

    public function editSubmmitedPurchaseRequest($insert_procured_id,$quarter_id){
        $this->emit('openSubmmitedPurchaseRequestModal');
        $this->emit('editSubmmitedPurchaseRequestData',$insert_procured_id,$quarter_id);
    }
    
    public function AttachDocument($PurchaseRequestId)
    {
        $this->emit('openAttachDocumentModal');
        $this->emit('editAttachDocumentData',$PurchaseRequestId);
    }
    
    public function Print($PurchaseRequestId)
    {
        $UserData=PurchaseRequest::where('id',$PurchaseRequestId)->first();
        $office=$UserData->getUser->getOffice->office;
        $pr_no=date_create_from_format("Y-m-d",$UserData->purchase_request_date)->format("Y-m-").$UserData->getPrNumber->pr_number;
        $pr_date=$UserData->purchase_request_date;
        $this->emit('EmitTable');
        $this->emit('refresh_submmitedpurchaserequest_table');
        
        if ($UserData->status_id!=29) {
            $data = ([
                'status_id'                 => 29,
            ]);
            PurchaseRequest::find($PurchaseRequestId)->update($data);
            $this->emit('alert_update');
        }
        
        $pdfContent = PDF::loadView('livewire.spmo-panel.printing.print-purchase-request',[
            'office' => $office,
            'pr_no' => $pr_no,
            'pr_date' => $pr_date,
            'PurchaseRequestItem' => PurchaseRequestItem::all()->where('insert_procured_id',$UserData->insert_procured_id),
            'total_all' => 0,
            'purpose' => $UserData->purpose,
            'UserName' => $UserData->getUser->name,
            'Office' => $UserData->getUser->getOffice->office
            ])->setPaper('Legal', 'Portrait')->output();
        return response()->streamDownload(fn () => print($pdfContent),$pr_no.".pdf");
        
    }
}
