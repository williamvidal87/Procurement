<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsertBudget extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'item_category_id',
        'first_quarter',
        'second_quarter',
        'third_quarter',
        'fourth_quarter',
    ];
    
    public function getItemCategory()
    {
        return $this->belongsTo(ItemCategory::class,'item_category_id');
    }
}
