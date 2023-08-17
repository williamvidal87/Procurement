<?php

namespace App\Http\Livewire\Chat;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatForm extends Component
{
    public $user_id;
    public $message;
    protected $listeners = [
        'UserId'
    ];
    
    public function UserId($user_id)
    {
        $this->user_id=$user_id;
        $ChatMessageData=ChatMessage::where('from_id',$this->user_id)->where('to_id',Auth::user()->id)->get();
        foreach ($ChatMessageData as $chatMessageData) {
            $data = ([
                'status_id'                     => 31,
            ]);
            
            ChatMessage::find($chatMessageData->id)->update($data);
        }
    }
    
    public function render()
    {
        return view('livewire.chat.chat-form',[
            'ChatMessageData' => ChatMessage::where([['from_id',Auth::user()->id],['to_id',$this->user_id]])->orwhere([['from_id',$this->user_id],['to_id',Auth::user()->id]])->get()->sortBy('created_at')
            ])->with('getfromName','gettoName');
    }
    
    public function SendMessage()
    {
        $check_space=$this->message;
        $remove_space =trim($check_space);
        if($remove_space==null)
        {
            return;
        }
        date_default_timezone_set('Asia/Manila');
        $data = ([
            'from_id'                       => Auth::user()->id,
            'to_id'                         => $this->user_id,
            'message'                       => $this->message,
            'status_id'                     => 30,
            'created_at'                    => date('Y-m-d H:i:s'),
        ]);

        
        ChatMessage::create($data);
        $this->message="";
    
    }
    
    public function closeChatModal()
    {
        $this->emit('closeChatModal');
        $this->emit('refresh_chat_table');
    }
}
