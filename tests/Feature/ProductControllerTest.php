<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Testing\TestResponse;
class ProductControllerTest extends TestCase
{
    //use RefreshDatabase;

  
    // test the function using controller 
    // good for checking syntax error
    public function test_it_returns_products_with_price_greater_than_10()
    {
        $controller = new ProductController();
        $response = $controller->checkPrice();
    
        $testResponse = new TestResponse($response);
    
        $testResponse->assertStatus(200);
    }

    public function test_testController2(){

        $controller = new ProductController();
        $response = $controller->test2();
        $testResponse = new TestResponse($response);
        $responseData = $testResponse->json(); 
        $correctValue = "59.88";

        // check equals price
        $this->assertEquals($correctValue, $responseData['price']);
        // Ensure the 'price' key exists in the response
        $this->assertArrayHasKey('price', $responseData, "'price' key is missing in response");

        $this->assertGreaterThan(60, $responseData['price'], "Price should be greater than 50, found: {$responseData['price']}");

        $testResponse->assertStatus(200);
  
    }
    
}
