<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'insert_procured_id',
        'purchase_request_number',
        'request_category_id',
        'quarter_id',
        'status_id',
        'purchase_request_date',
        'document',
        'remark',
        'purpose',
        'pr_id',
    ];
    
    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id')->with('getOffice');
    }
    
    public function getInsertProcured()
    {
        return $this->belongsTo(InsertProcured::class,'insert_procured_id')->with('getItemCategory');
    }
    
    public function getRequestCategory()
    {
        return $this->belongsTo(RequestCategory::class,'request_category_id');
    }
    
    public function getQuarter()
    {
        return $this->belongsTo(Quarter::class,'quarter_id');
    }
    
    public function getStatus()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
    
    public function getPrNumber()
    {
        return $this->belongsTo(PrNumber::class,'pr_id');
    }
}
