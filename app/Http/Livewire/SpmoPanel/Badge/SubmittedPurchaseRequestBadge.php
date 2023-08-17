<?php

namespace App\Http\Livewire\SpmoPanel\Badge;

use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubmittedPurchaseRequestBadge extends Component
{
    public function render()
    {
        return view('livewire.spmo-panel.badge.submitted-purchase-request-badge',[
            'SubmmitedPurchaseRequestData' =>  PurchaseRequest::where('user_id',Auth::user()->id)->whereIn('status_id',[26,27,28,29])->get()
        ])->with('getInsertProcured','getQuarter','getStatus');
    }
}
