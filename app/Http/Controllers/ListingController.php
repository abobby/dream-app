<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SearchController AS Search;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExpressInterestNotifier;
use DB;

class ListingController extends Controller
{
    public function __construct() {

    }

    /**
     * Index view of listings displays all the items
     */
    public function index() {
        $listings = Search::allListings();
        return view('listing.index', [
            'allitems' => $listings,
        ]);
    }


    public function searchItems(Request $request){
        $categories = \App\Model\ListingCategories::all();
        return view('listing.search-items', [
            'types' => $categories
        ]);
    }

    public function searchItemsResult(Request $request){
        if($request->isMethod('post')) {
            $categories = \App\Model\ListingCategories::all();
            $searchlist = Search::keywordListing($request->type, $request->keyword, $request->minprice, $request->maxprice);
            $request->flash();
            return view('listing.search-items', [
                'searchlist' => $searchlist,
                'types' => $categories,
            ]);
        }
    }

    /**
     * Individual Listing page
     * @param $id
     */
    public function listingDetail($id){
        $listingDetail = Search::itemDetail($id);
        return view('listing.item-detail', [
           'details' => $listingDetail
        ]);
    }

    public function listingReviews($id){
        $itemReviews = Search::itemReviews($id);
        return view('reviews.allreviews', [
            'allreviews' => $itemReviews
        ]);
    }

    public function interestSubmit(Request $request){
        if($request->isMethod('post')){
            $validatedData = $this->validate($request,[
                'byrname' => 'required',
                'byremail' => 'required|email',
                'byrphone' => 'digits_between:10,15|max:20',
            ]);

            DB::beginTransaction();
            try {
                $datetime = new \Datetime();
                $newInterest = \App\Model\Buyers::create([
                    'listing_id' => $request->listId,
                    'list_title' => $request->listtitle,
                    'buyer_name' => $request->byrname,
                    'buyer_email' => $request->byremail,
                    'phone' => $request->byrphone,
                    'created_at' => $datetime,
                    'updated_at' => $datetime,
                ]);

                if ($_ENV['APP_ENV'] == 'staging' || $_ENV['APP_ENV'] == 'production') {
                    Mail::to($request->selleremail)->send(new ExpressInterestNotifier($request->byrname, $request->byremail, $request->byrphone, $request->listId, $request->listtitle));
                } else {

                }

                DB::commit();
                $request->flash();
                return back()->with('success', 'Thanks! your Interest has been forwarded to the seller.');

            } catch (\Exception $ex) {
                DB::rollback();
                $request->flash();
                return back()->with('error', 'Some issue occured, while processing your request. Please try again later.');
            }

        }
    }


}
