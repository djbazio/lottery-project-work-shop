<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; //ใส่ตามนี้
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'name',
        'province',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
