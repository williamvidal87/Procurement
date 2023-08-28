<?php

namespace App\Http\Livewire\SpmoPanel\CompletelyDelevered;

use App\Models\PurchaseRequest;
use Livewire\Component;

class CompletelyDeleveredTable extends Component
{
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.spmo-panel.completely-delevered.completely-delevered-table',[
            'PurchaseRequestData' =>  PurchaseRequest::whereIn('status_id',[16,25])->get()
        ])->with('getStatus','getPrNumber');
    }
}
