<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no',
        'num',
        'price',
        'status',
        'bran_id',
        'set',
        'volume',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class,'bran_id');
    }
}
