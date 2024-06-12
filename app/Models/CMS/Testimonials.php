<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonials extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'designation',
        'status',
        'content',
    ];
    protected $casts = [
        'status' => 'boolean'
    ];
}
