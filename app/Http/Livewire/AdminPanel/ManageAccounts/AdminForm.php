<?php

namespace App\Http\Livewire\AdminPanel\ManageAccounts;

use App\Models\User;
use App\Models\UserActivityLogsDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminForm extends Component
{
    public  $data = [];
    public  $name,
            $email,
            $temp_email,
            $password,
            $newpassword,
            $confirmpassword,
            $email_address,
            $phone_number,
            $rule_id;
    public  $UserID;
    
    protected $listeners = ['editAdminData'];
    
    public function render()
    {
        return view('livewire.admin-panel.manage-accounts.admin-form');
    }

    public function editAdminData($UserID)
    {
        $this->UserID=$UserID;
        $DATA=User::find($this->UserID);
        $this->name = $DATA['name'];
        $this->email = $DATA['email'];
        $this->temp_email = $DATA['email'];

    }
    
    public function store()
    {
        if ($this->UserID) {
            if ($this->temp_email==$this->email) {
                $this->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'newpassword' => 'same:confirmpassword',
                    'confirmpassword' => '',
                    'email_address' => 'required',
                    'phone_number' => 'required','numeric','digits:10',
                ]);
            } else {
                $this->validate([
                    'name' => 'required',
                    'email' => 'required|unique:users',
                    'newpassword' => 'same:confirmpassword',
                    'confirmpassword' => '',
                    'email_address' => 'required',
                    'phone_number' => 'required','numeric','digits:10',
                ]);
            }
        } else {
        
            $this->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|same:confirmpassword',
                'confirmpassword' => 'required',
                'email_address' => 'required',
                'phone_number' => 'required','numeric','digits:10',
            ]);
        }
        
        $this->data = ([
            'name'                      => $this->name,
            'email'                     => $this->email,
            'email_address'             => $this->email_address,
            'phone_number'              => $this->phone_number,
        ]);

        try {
            if($this->UserID){
                if ($this->newpassword) {
                    $this->data['password']=bcrypt($this->newpassword);
                }
                User::find($this->UserID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
                $this->data['password']=bcrypt($this->password);
                $this->data['rule_id']=1;
                $show=User::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeAdminModal');
        $this->emit('refresh_admin_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeAdminForm(){
        $this->emit('closeAdminModal');
        $this->emit('refresh_admin_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
