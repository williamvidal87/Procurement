<?php

namespace App\Http\Livewire\AdminPanel\Badge;

use App\Models\PurchaseRequest;
use Livewire\Component;

class CompletelyDeliveredBadge extends Component
{
    public function render()
    {
        return view('livewire.admin-panel.badge.completely-delivered-badge',[
            'PurchaseRequestData' =>  PurchaseRequest::whereIn('status_id',[16,25])->get()
        ])->with('getStatus');
    }
}
