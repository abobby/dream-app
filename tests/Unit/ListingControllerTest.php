<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ListingControllerTest extends TestCase
{
    /** @test */
    public function test_home_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    
    /** @test */
    public function test_all_item_is_displayed()
    {
        $response = $this->get('/');
        $response->assertSeeText('Details');
    }
    
    /** @test */
    public function test_if_no_item_is_listed()
    {
        $response = $this->get('/');
        $response->assertSeeText('Sorry not items have been listed yet. Please check back later.');
    }
    
    
    /** @test */
    public function test_individual_item_is_displayed()
    {
        $response = $this->get('/item-detail/1');
        $response->assertSeeText('Category');
    }
    
    /** @test */
    public function test_individual_item_does_not_exist()
    {
        $response = $this->get('/item-detail/12');
        $response->assertSeeText('Sorry! the item you are looking for does not exist');
    }
    
    /** @test */
    /*public function test_search_item_result_with_keyword()
    {
        $this->visit('item-search')
            ->select(1, 'type')
            ->type('truck', 'keyword')
            ->type('1000', 'minprice')
            ->type('10000', 'maxprice')
            ->press('Search')
            ->seePageIs('/item-search-result');
    }*/
    
}
