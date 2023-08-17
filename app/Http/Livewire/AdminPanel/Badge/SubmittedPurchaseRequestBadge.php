<?php

namespace App\Http\Livewire\AdminPanel\Badge;

use App\Models\PurchaseRequest;
use Livewire\Component;

class SubmittedPurchaseRequestBadge extends Component
{
    public function render()
    {
        return view('livewire.admin-panel.badge.submitted-purchase-request-badge',[
            'AdminSubmittedPurchaseRequestData' =>  PurchaseRequest::whereIn('status_id',[27,28,29])->get()
        ])->with('getInsertProcured','getQuarter','getStatus','getUser');
    }
}
