<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsertProcured extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'item_category_id',
        'first_quarter',
        'second_quarter',
        'third_quarter',
        'fourth_quarter',
        'year_budget',
    ];
    
    public function getItemCategory()
    {
        return $this->belongsTo(ItemCategory::class,'item_category_id');
    }
    
    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id')->with('getOffice');
    }
}
