<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SearchController AS Search;

class SellerController extends Controller
{
    public function __construct() {

    }

    public function index() {
        return view('seller.index');
    }

    public function registerSeller(Request $request){
        if($request->isMethod('post')){

        }

    }

    public function loginSeller(Request $request){
        if($request->isMethod('post')){

        }

    }

    public function editSellerDetails(Request $request){
        if($request->isMethod('post')){
            if(Auth::user()->id == $request->seller_id){

            } else {
                return back()->with('error', 'Sorry you are not authorised to make changes for this user');
            }
        }
    }

    public function createListing(){
        $id = Auth::user()->id;
        $sellerDetails = Search::sellerDetails($id);
        return response('listing.create-form', [
            'sellerdetails' => $sellerDetails,
        ]);
    }

    public function saveListing(Request $request){
        if($request->isMethod('post')){
            if(Auth::user()->id == $request->seller_id){

                return back()->with('success', 'Listing Created successfully');
            } else {
                return back()->with('error', 'Sorry you are not authorised to make changes for this user');
            }
        }
    }

}
