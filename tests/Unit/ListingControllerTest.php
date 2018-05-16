<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ListingControllerTest extends TestCase
{
    /** 
     * Test if home page is loaded
     * @test 
     */
    public function test_home_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    
    /** 
     * Test if all items are displayed in home page 
     * @test 
     */
    public function test_all_item_is_displayed()
    {
        $response = $this->get('/');
        $response->assertSeeText("Details");
        $response->assertDontSeeText("Sorry not items have been listed yet. Please check back later.");
    }
    
    /** 
     * Test if no items are listed yet
     * @test 
     */
    public function test_if_no_item_is_listed()
    {
        $response = $this->get('/');
        if($response->assertSeeText("Details")){
            //
        } else {
            $response->assertSeeText("Sorry not items have been listed yet. Please check back later.");
        }
    }
    
    
    /** 
     * Test individual items details page is loaded
     * @test 
     */
    public function test_individual_item_is_displayed()
    {
        $response = $this->get("/item-detail/1");
        $response->assertSeeInOrder(['<strong>Title :</strong>', '<strong>Category :</strong>', '<strong>Details :</strong>']);
    }
    
    /** 
     * Test individual items is not present and proper message is displayed
     *  @test 
     */
    public function test_individual_item_does_not_exist()
    {
        $response = $this->get("/item-detail/12");
        $response->assertSeeText('Sorry! the item you are looking for does not exist');
    }
}
