<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\CMS\Blog;
use App\Models\Scopes\AdminScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, SoftDeletes;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bio',
        'username',
        'email',
        'profile_image',
        'phone',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];


    protected static function booted(): void
    {
        parent::boot();
        static::created(static function ($user) {
            $user->update(['username' => $user->name]);
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
        $this->attributes['username'] = $slug;
    }

    /**
     * Increment slug
     *
     * @param string $slug
     * @return  string
     **/
    public function incrementSlug(string $slug): string
    {
        $max = static::whereTitle($this->title)->latest('id')->skip(1)->value('username');
        if (is_numeric($max[-1])) {
            return preg_replace_callback('/(\d+)$/', static function ($matches) {
                return $matches[1] + 1;
            }, $max);
        }
        return "{$slug}-2";
    }
    public function social_links(): MorphMany
    {
        return $this->morphMany(SocialLinks::class, 'entity');
    }
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'author_id', 'id');
    }
}
