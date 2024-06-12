<?php

namespace App\Models\CMS;

use App\Livewire\CMS\BlogCategoryCrud;
use App\Models\Scopes\AdminScope;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'instagram_reel_link',
        'short_description',
        'banner',
        'views',
        'files',
        'priority',
        'status',
        'category_id',
        'author_id',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'files' => 'array',
    ];

    protected static function booted(): void
    {
        parent::boot();
        static::addGlobalScope(new AdminScope('author_id'));
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

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class, 'blog_tag', 'blog_id', 'tag_id');
    }

    public function category(): HasOne
    {
        return $this->hasOne(BlogCategory::class, 'id', 'category_id');
    }

    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
