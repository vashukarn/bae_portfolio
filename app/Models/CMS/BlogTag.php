<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BlogTag extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'status',
    ];

    protected static function booted(): void
    {
        parent::boot();
        static::created(static function ($post) {
            $post->update(['slug' => $post->title]);
        });
    }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setSlugAttribute(string $value): void
    {
        if (static::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = $this->incrementSlug($slug);
        }
        $this->attributes['slug'] = $slug;
    }

    /**
     * Increment slug
     *
     * @param string $slug
     * @return  string
     **/
    public function incrementSlug(string $slug): string
    {
        $max = static::whereTitle($this->title)->latest('id')->skip(1)->value('slug');
        if (is_numeric($max[-1])) {
            return preg_replace_callback('/(\d+)$/', static function ($matches) {
                return $matches[1] + 1;
            }, $max);
        }
        return "{$slug}-2";
    }

    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class, 'blog_tag', 'tag_id', 'blog_id');
    }
}
