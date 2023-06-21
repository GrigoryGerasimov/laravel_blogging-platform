<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'role_users';

    /**
     * @var bool
     */
    protected $guarded = false;
}
