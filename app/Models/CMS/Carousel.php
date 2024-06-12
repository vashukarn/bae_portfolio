<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carousel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'sub_title',
        'redirect_url',
        'image',
        'status',
    ];
    protected $casts = [
        'status' => 'boolean'
    ];
}
