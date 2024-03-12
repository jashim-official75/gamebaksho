<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'game_name',
        'game_description',
        'game_thumbnail',
        'game_banner',
        'game_file',
        'is_free',
        'is_exclusive',
        'free',
        'zip_file_name',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    public function gameCategory()
    {
        return $this->hasOne(GameCategory::class);
    }

    public function gameCategories()
    {
        return $this->hasMany(GameCategory::class);
    }
}

