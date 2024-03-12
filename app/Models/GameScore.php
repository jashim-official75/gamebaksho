<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameScore extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function SubUser(){
        return $this->belongsTo(Subscriber::class, 'subscriber_id');
    }
}
