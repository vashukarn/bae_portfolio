<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLinks extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'social_id',
        'entity',
        'link',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'entity_id', 'id');
    }
    public function social(): BelongsTo
    {
        return $this->belongsTo(Social::class, 'social_id', 'id');
    }
}
