<?php

namespace App\Http\Livewire\AdminPanel\ManageAccounts;

use App\Models\Office;
use App\Models\User;
use Livewire\Component;

class UserForm extends Component
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
            $rule_id,
            $office_id;
    public  $UserID;
    
    protected $listeners = ['editUserData'];
    
    public function render()
    {
        return view('livewire.admin-panel.manage-accounts.user-form',[
            'OfficeData' =>  Office::all()
        ]);
    }

    public function editUserData($UserID)
    {
        $this->UserID=$UserID;
        $DATA=User::find($this->UserID);
        $this->name = $DATA['name'];
        $this->email = $DATA['email'];
        $this->temp_email = $DATA['email'];
        $this->email_address = $DATA['email_address'];
        $this->phone_number = $DATA['phone_number'];
        $this->office_id = $DATA['office_id'];

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
                    'phone_number' => 'digits:10',
                    'office_id' => 'required',
                ]);
            } else {
                $this->validate([
                    'name' => 'required',
                    'email' => 'required|unique:users',
                    'newpassword' => 'same:confirmpassword',
                    'confirmpassword' => '',
                    'email_address' => 'required',
                    'phone_number' => 'digits:10',
                    'office_id' => 'required',
                ]);
            }
        } else {
        
            $this->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|same:confirmpassword',
                'confirmpassword' => 'required',
                'email_address' => 'required',
                'phone_number' => 'digits:10',
                'office_id' => 'required',
            ]);
        }
        
        $this->data = ([
            'name'                      => $this->name,
            'email'                     => $this->email,
            'email_address'             => $this->email_address,
            'phone_number'              => $this->phone_number,
            'office_id'                 => $this->office_id,
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
                $this->data['rule_id']=3;
                $show=User::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeUserModal');
        $this->emit('refresh_user_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeUserForm(){
        $this->emit('closeUserModal');
        $this->emit('refresh_user_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
