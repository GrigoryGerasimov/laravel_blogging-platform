<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations\BelongsTo, Relations\BelongsToMany, Relations\HasMany, SoftDeletes};

class Post extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @var string[]
     */
    protected $withCount = ['likedByUsers', 'comments'];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favourites', 'post_id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    /**
     * @return string
     */
    public function getCreatedAtDateFormattedAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('F d, H:i');
    }
}
