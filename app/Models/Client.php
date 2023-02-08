<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number','adviser_id'];


    public function cashLoan()
    {
        return $this->hasOne(CashLoanProduct::class, 'client_id');
    }

    public function homeLoan()
    {
        return $this->hasOne(HomeLoanProduct::class, 'client_id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
