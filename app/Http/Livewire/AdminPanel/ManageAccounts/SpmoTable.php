<?php

namespace App\Http\Livewire\AdminPanel\ManageAccounts;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SpmoTable extends Component
{
    protected $listeners = [
        'refresh_spmo_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.manage-accounts.spmo-table',[
            'SpmoData' =>  User::all()->where('rule_id',2)->whereNotIn('id',Auth::user()->id)
        ])->with('getOffice');
    }

    public function editSpmo($UserID){
        $this->emit('openSpmoModal');
        $this->emit('editSpmoData',$UserID);
    }

    public function createSpmo(){
        $this->emit('openSpmoModal');
    }

    public function deleteSpmo($UserID){
        $this->emit('openSwalDelete',$UserID);
    }

    public function DeleteData($UserID){
        User::destroy($UserID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
