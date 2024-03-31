<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $collection = 'short_urls';
    protected $fillable = ['url', 'code'];
}
