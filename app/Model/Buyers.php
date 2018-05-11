<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Buyers extends Model
{
    protected $table = 'buyers';

    protected $fillable = [
        'listing_id',
        'list_title',
        'buyer_name',
        'buyer_email',
        'phone',
        'created_at',
        'updated_at'
    ];

}
