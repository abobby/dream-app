<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class ListingCategories extends Model
{
    protected $table = 'listing_categories';

    protected $fillable = [
        'category_name',
        'created_at',
        'updated_at'
    ];
}
