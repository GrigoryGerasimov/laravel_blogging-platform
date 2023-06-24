<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'favourites';

    /**
     * @var bool
     */
    protected $guarded = false;
}
