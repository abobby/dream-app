<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListingControllerTest extends DuskTestCase
{
    
    public function test_search_page_is_loading(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink("Search Items")
                    ->assertUrlIs('/item-search');
        });
    }

    /*public function test_search_item_result_with_keyword(Browser $browser)
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('item-search')
            ->select(1, 'type')
            ->type('truck', 'keyword')
            ->type('1000', 'minprice')
            ->type('10000', 'maxprice')
            ->press('Search')
            ->assertPathIs('/item-search-result');
        });
    }*/
}
