<?php

namespace App\Http\Livewire\UserPanel\Badge;

use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ApprovedPurchaseRequestBadge extends Component
{
    public function render()
    {
        return view('livewire.user-panel.badge.approved-purchase-request-badge',[
            'PurchaseRequestData' =>  PurchaseRequest::where('user_id',Auth::user()->id)->whereIn('status_id',[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,17,18,19,20,21,22,23,24])->get()
        ])->with('getStatus');
    }
}
