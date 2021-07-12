<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferNotice extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pic',
        'status',
        'money',
        'cusm_id',
        'bank_id',
        'name_account',
        'no',
        'name_bank',
        'bank_cus_id',
    ];

    public function my_bank(){
        return $this->belongsTo(MyBank::class,'bank_id');
    }

    public function customer(){
        return $this->belongsTo(Customers::class,'cusm_id');
    }

    public function confirmation_money(){
        return $this->hasOne(ConfirmationMoney::class,'id');
    }
}
