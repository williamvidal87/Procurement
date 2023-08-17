<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityLogsDatabase extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','activity'];
}
