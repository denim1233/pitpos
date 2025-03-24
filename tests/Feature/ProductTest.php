<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    //use RefreshDatabase; // Resets database after each test


    public function test_it_can_create_a_product()
    {

        // Product data
        $data = [
            'name' => 'Laptop',
            'description' => 'A powerful laptop',
            'status_id' => 1,
            'category_id' => 1,
            'created_user' => 1,
            'updated_user' => 0,
        ];

        // Send request
        $response = $this->postJson('/api/products', $data);

        // Validate response
        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Product created successfully!',
                 ]);

        // Check database
        //$this->assertDatabaseHas('products', ['name' => 'Laptop']);
    }


    public function test_it_can_update_a_product()
{
    // New update data
    $updateData = [
        'name' => 'Test 2',
        'status_id' => 1,
        'unit_id' => 1,
        'updated_user' => 1,
    ];

    // Send update request
    $response = $this->putJson("/api/products/24", $updateData);

    // Print response content in case of failure
    if ($response->status() !== 200) {
        dd($response->json());
    }

    // Validate response
    $response->assertStatus(200)
             ->assertJson([
                 'message' => 'Product updated successfully!',
             ]);
}
}
