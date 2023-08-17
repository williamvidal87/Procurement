<?php

namespace App\Http\Livewire\SpmoPanel\Badge;

use App\Models\PurchaseRequest;
use Livewire\Component;

class CompletelyDeliveredBadge extends Component
{
    public function render()
    {
        return view('livewire.spmo-panel.badge.completely-delivered-badge',[
            'PurchaseRequestData' =>  PurchaseRequest::whereIn('status_id',[16,25])->get()
        ])->with('getStatus');
    }
}
