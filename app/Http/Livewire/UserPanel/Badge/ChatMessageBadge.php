<?php

namespace App\Http\Livewire\UserPanel\Badge;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatMessageBadge extends Component
{
    public function render()
    {
        return view('livewire.user-panel.badge.chat-message-badge',[
            'ChatMessageData' =>  ChatMessage::where('to_id',Auth::user()->id)->where('status_id',30)->get()
        ])->with('getStatus');
    }
}
