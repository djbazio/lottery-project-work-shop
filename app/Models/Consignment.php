<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seller_id',
        'bran_id',
        'lottery_id',
        'num',
        'con_id',
    ];

    public function branches()
    {
        return $this->belongsTo(Branch::class, 'bran_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function lottery()
    {
        return $this->belongsTo(Lottery::class,'lottery_id');
    }
}
