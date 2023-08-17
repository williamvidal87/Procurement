<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;
    
    protected $fillable = ['from_id','to_id','message','status_id'];
    
    
    public function getfromName()
    {
        return $this->belongsTo(User::class,'from_id');
    }
    public function gettoName()
    {
        return $this->belongsTo(User::class,'to_id');
    }
}
