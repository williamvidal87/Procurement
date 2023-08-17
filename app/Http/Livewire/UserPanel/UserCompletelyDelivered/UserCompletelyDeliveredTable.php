<?php

namespace App\Http\Livewire\UserPanel\UserCompletelyDelivered;

use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserCompletelyDeliveredTable extends Component
{
    public function render()
    {
        return view('livewire.user-panel.user-completely-delivered.user-completely-delivered-table',[
            'PurchaseRequestData' =>  PurchaseRequest::where('user_id',Auth::user()->id)->whereIn('status_id',[16,25])->get()
        ])->with('getStatus');
    }
}
