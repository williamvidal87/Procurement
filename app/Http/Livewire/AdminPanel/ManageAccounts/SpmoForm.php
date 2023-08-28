<?php

namespace App\Http\Livewire\AdminPanel\ManageAccounts;

use App\Models\User;
use Livewire\Component;

class SpmoForm extends Component
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
    
    protected $listeners = ['editSpmoData'];
    
    public function render()
    {
        return view('livewire.admin-panel.manage-accounts.spmo-form');
    }

    public function editSpmoData($UserID)
    {
        $this->UserID=$UserID;
        $DATA=User::find($this->UserID);
        $this->name = $DATA['name'];
        $this->email = $DATA['email'];
        $this->temp_email = $DATA['email'];
        $this->email_address = $DATA['email_address'];
        $this->phone_number = $DATA['phone_number'];

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
                ]);
            } else {
                $this->validate([
                    'name' => 'required',
                    'email' => 'required|unique:users',
                    'newpassword' => 'same:confirmpassword',
                    'confirmpassword' => '',
                    'email_address' => 'required',
                    'phone_number' => 'digits:10',
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
                $this->data['rule_id']=3;
                $this->data['office_id']=35;
                $show=User::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeSpmoModal');
        $this->emit('refresh_spmo_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeSpmoForm(){
        $this->emit('closeSpmoModal');
        $this->emit('refresh_spmo_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
