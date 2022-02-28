<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $dates = ['published_at'];

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    } 
}
