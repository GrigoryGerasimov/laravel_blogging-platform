<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUser extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'post_users';

    /**
     * @var bool
     */
    protected $guarded = false;
}
