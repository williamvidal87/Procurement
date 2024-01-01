<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'insert_budget_id',
        'quarter_id',
        'user_id',
        'category_id',
        'item_no',
        'unit_measure',
        'item_description',
        'qty',
        'estimated_cost'
    ];
}
