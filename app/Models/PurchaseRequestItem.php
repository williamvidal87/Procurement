<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequestItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'insert_procured_id',
        'quarter_id',
        'item_no',
        'unit_measure',
        'item_description',
        'qty',
        'estimated_cost'
    ];
}
