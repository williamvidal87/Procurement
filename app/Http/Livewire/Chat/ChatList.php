<?php

namespace App\Http\Livewire\Chat;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatList extends Component
{
    protected $listeners = [
        'refresh_chat_table' => '$refresh',
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.chat.chat-list',[
            'UserData' =>  User::all()->whereNotIn('id',Auth::user()->id),
            'messages_status' => ChatMessage::where('to_id',Auth::user()->id)->get()->sortBy('created_at'),
            'last_message' => ChatMessage::all()->sortBy('created_at'),
        ]);
    }
    
    public function openChatForm($user_id)
    {
        $this->emit('openChatModal');
        $this->emit('UserId',$user_id);
    }
}
