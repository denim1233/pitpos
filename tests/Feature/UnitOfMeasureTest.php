<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitOfMeasureTest extends TestCase
{
    //use RefreshDatabase;

    public function test_it_can_create_a_unit_of_measure(): void
    {
        $response = $this->postJson('/api/units-of-measure', [
            'name' => 'Meter',
            'status_id' => 1,
            'price' => 5,
            'set_as_default' => true,
            'created_user' => 1,
            'updated_user' => 1,
        ]);
    

        if ($response->status() !== 201) {
            dd($response->json());
        }
    
        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Unit of Measure created successfully!',
                 ]);
    
        $this->assertDatabaseHas('unit_of_measures', ['name' => 'Ton']);
    }

    public function test_it_can_update_a_unit_of_measure(): void
    {

        // Send update request
        $response = $this->putJson("/api/units-of-measure/3", [
            'name' => 'Ton/s',
            'status_id' => 1,
            'price' => 5, // Optional: Update price
            'set_as_default' => true,
            'updated_user' => 1,
        ]);

        if ($response->status() !== 200) {
            dd($response->json());
        }

        // Assert response
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Unit of Measure updated successfully!',
                 ]);

        // Assert the database contains updated data
        $this->assertDatabaseHas('unit_of_measures', ['id' => 3, 'name' => 'Ton/s']);
    }
    
}
