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

    /**
     * Provides Seller Details
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller(){
        return $this->belongsTo('App\Model\Sellers', 'seller_id');
    }

    /**
     * Provides Listing Category Details
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo('App\Model\ListingCategories', 'category_id');
    }

    /**
     * Provides list of Images for Individual listing
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images() {
        return $this->hasMany('App\Model\ListingImages', 'listing_id');
    }

    /**
     * Provides list of reviews for Individual listing
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews() {
        return $this->hasMany('App\Model\Reviews', 'listing_id');
    }
}
