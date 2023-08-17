<?php

namespace App\Http\Livewire\AdminPanel\ManageAccounts;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserTable extends Component
{
    protected $listeners = [
        'refresh_user_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.manage-accounts.user-table',[
            'UserData' =>  User::all()->where('rule_id',3)->whereNotIn('id',Auth::user()->id)
        ])->with('getOffice');
    }

    public function editUser($UserID){
        $this->emit('openUserModal');
        $this->emit('editUserData',$UserID);
    }

    public function createUser(){
        $this->emit('openUserModal');
    }

    public function deleteUser($UserID){
        $this->emit('openSwalDelete',$UserID);
    }

    public function DeleteData($UserID){
        User::destroy($UserID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
