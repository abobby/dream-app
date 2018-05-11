<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct() {

    }

    public static function allListings() {
        $all = \App\Model\Listings::where('status', 1)->get();
        foreach($all AS $item){
            $item->images = \App\Model\Listings::find($item->id)->images->first();
        }
        if(count($all) > 0){
            return $all;
        } else {
            return false;
        }
    }

    public static function sellerListings($sellerid){
        $selleritems = \App\Model\Listings::where('seller_id', $sellerid)->get();
        if(count($selleritems) > 0){
            return $selleritems;
        } else {
            return false;
        }
    }

    public static function keywordListing($type, $keyword = null, $min = null, $max = null){
        $query = \App\Model\Listings::query()
                ->when($type, function ($query) use ($type) {
                    return $query->where('category_id', $type);
                })
                ->when($min, function ($query) use ($min) {
                    return $query->where('price', '>', $min);
                })
                ->when($max, function ($query) use ($max) {
                    return $query->where('price', '<', $max);
                })
                ->when($keyword, function ($query) use ($keyword) {
                    return $query->where(function($query) use ($keyword){
                        $query->orWhere('title', 'LIKE', "%{$keyword}%")
                        ->orWhere( 'description', 'LIKE', "%{$keyword}%")
                        ->orWhere( 'lmake', 'LIKE', "%{$keyword}%")
                        ->orWhere( 'lmodel', 'LIKE', "%{$keyword}%")
                        ->orwhereRaw('json_contains(meta_data, \'["' . $keyword . '"]\')');
                        //->orwhereRaw('JSON_CONTAINS(meta_data->"$.color", \'["'.$keyword.'%"]\')');
                });

                /*return $query->orWhere('title', 'LIKE', "%{$keyword}%")
                ->orWhere( 'description', 'LIKE', "%{$keyword}%")
                ->orwhereRaw('json_contains(search_field, \'["' . $keyword . '"]\')');*/
                });

        $result = $query->orderBy('created_at', 'desc')->get();
        if(count($result) > 0){
            foreach($result AS $item){
                $item->images = \App\Model\Listings::find($item->id)->images->first();
            }
            return $result;
        } else {
            return false;
        }
    }

    public static function itemDetail($itemid) {
        $selects = ['id', 'name', 'email', 'phone', 'type'];
        $item = \App\Model\Listings::find($itemid);
        $item->seller = \App\Model\Listings::find($itemid)->seller->select($selects)->first();
        $item->category = \App\Model\Listings::find($itemid)->category;
        $item->images = \App\Model\Listings::find($itemid)->images;
        $item->reviews = \App\Model\Listings::find($itemid)->reviews;

        if(count($item) > 0){
            return $item;
        } else {
            return false;
        }
    }

    public static function itemReviews($itemid) {
        $itemreviews = \App\Model\Reviews::where('listing_id', $itemid)->get();
        if(count($itemreviews) > 0){
            return $itemreviews;
        } else {
            return false;
        }
    }

    public static function sellerDetails($sellerid) {
        $seller = \App\Model\Sellers::find($sellerid);
        if(count($seller) > 0){
            return $seller;
        } else {
            return false;
        }
    }



}
