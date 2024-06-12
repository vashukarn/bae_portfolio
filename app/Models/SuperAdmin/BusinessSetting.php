<?php

namespace App\Models\SuperAdmin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessSetting extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'key',
        'data_type',
        'dev_value',
        'prod_value',
    ];
}
