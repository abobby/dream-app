<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Listings extends Model
{
    protected $table = 'listings';

    protected $fillable = [
        'category_id',
        'seller_id',
        'title',
        'description',
        'lyear',
        'lmake',
        'lmodel',
        'price',
        'meta_data',
        'created_at',
        'updated_at',
        'status',
    ];

    public function seller(){
        return $this->belongsTo('App\Model\Sellers', 'seller_id');
    }

    public function category(){
        return $this->belongsTo('App\Model\ListingCategories', 'category_id');
    }

    public function images() {
        return $this->hasMany('App\Model\ListingImages', 'listing_id');
    }

    public function reviews() {
        return $this->hasMany('App\Model\Reviews', 'listing_id');
    }
}
