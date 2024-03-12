<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRenew extends Model
{
    use HasFactory;
    public function Subscriber()
    {
        return $this->belongsTo(Subscriber::class, 'subscriber_id');
    }
}
