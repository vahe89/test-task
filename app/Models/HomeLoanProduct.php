<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeLoanProduct extends Model
{
    use HasFactory;

    protected $table = "home_loan_product";
    protected $fillable = ['client_id', 'adviser_id', 'property_value', 'down_payment_amount'];
    protected $appends = ['type', 'product_value', 'creation_date'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function getTypeAttribute()
    {
        return 'Home Loan';
    }

    public function getProductValueAttribute()
    {
        $value = null;
        if ($this->property_value && $this->down_payment_amount) {
            $value = $this->property_value . ' - ' . $this->down_payment_amount;
        }
        return $value;
    }

    public function getCreationDateAttribute()
    {
        return date('Y-m-d H:i', strtotime($this->created_at));
    }

}
