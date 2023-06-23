<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserLike extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'post_user_likes';

    /**
     * @var bool
     */
    protected $guarded = false;
}
