<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCustomer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no',
        'name_account',
        'name_bank',
        'cust_id',
    ];

    public function customers(){
        return $this->belongsTo(Customers::class,'cust_id');
    }
}
