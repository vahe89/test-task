<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashLoanProduct extends Model
{
    use HasFactory;

    protected $table = "cash_loan_product";
    protected $fillable = ['client_id', 'adviser_id', 'loan_amount'];
    protected $appends = ['type', 'product_value', 'creation_date'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function getTypeAttribute()
    {
        return 'Cash Loan';
    }

    public function getProductValueAttribute()
    {
        return $this->loan_amount ? $this->loan_amount : null;
    }

    public function getCreationDateAttribute()
    {
        return date('Y-m-d H:i', strtotime($this->created_at));
    }

}
