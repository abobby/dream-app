<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListingControllerTest extends DuskTestCase
{
    /**
     * Test if search page route is loaded
     */
    public function test_search_page_is_loading(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink("Search Items")
                    ->assertPathIs('/item-search');
        });
    }
    
    /**
     * Test if search result is listing items with searched selections/keywords
     */
    public function test_search_item_result_with_keyword(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/item-search')
                    ->assertPathIs('/item-search')
                    ->select('type', 1)
                    ->value('#keyword', 'truck')
                    ->value('#minprice', '10000')
                    ->value('#maxprice', '20000')
                    ->click('button[type="submit"]')
                    ->assertPathIs('/item-search-result')
                    ->assertSee("Details");
        });
    }
    
    /**
     * Test if search result displays message when items are not present with searched selections/keywords
     */
    public function test_search_no_item_result_with_keyword(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/item-search')
                    ->assertPathIs('/item-search')
                    ->select('type', 4)
                    ->click('button[type="submit"]')
                    ->assertPathIs('/item-search-result')
                    ->assertSee("Oh! sorry no items to display.");
        });
    }
}
