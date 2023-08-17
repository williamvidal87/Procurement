<?php

namespace App\Http\Livewire\UserPanel\Badge;

use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompletelyDeliveredBadge extends Component
{
    public function render()
    {
        return view('livewire.user-panel.badge.completely-delivered-badge',[
            'PurchaseRequestData' =>  PurchaseRequest::where('user_id',Auth::user()->id)->whereIn('status_id',[16,25])->get()
        ])->with('getStatus');
    }
}
