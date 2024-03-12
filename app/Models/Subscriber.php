<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subscriber extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function PurchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class, 'subscriber_id');
    }


}
