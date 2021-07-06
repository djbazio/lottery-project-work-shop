<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyBank extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no',
        'name',
        'logo',
    ];

    public function transfer_notice()
    {
        return $this->hasMany(TransferNotice::class, 'id');
    }
}
