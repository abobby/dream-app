<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ListingImages extends Model
{
    protected $table = 'listing_images';

    protected $fillable = [
        'listing_id',
        'thumb_image',
        'full_image',
        'created_at',
        'updated_at',
    ];

}
