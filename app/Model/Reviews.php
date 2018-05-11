<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'listing_id',
        'name',
        'email',
        'comment',
        'rating',
        'status'
    ];
}
