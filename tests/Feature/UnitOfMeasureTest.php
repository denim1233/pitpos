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
            'name' => 'Ton',
            'status_id' => 1,
            'price' => 11,
            'set_as_default' => true,
            'created_user' => 1,
            'updated_user' => 1,
        ]);
    
        // ✅ Dump response if status is not 201
        if ($response->status() !== 201) {
            dd($response->json());
        }
    
        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Unit of Measure created successfully!',
                 ]);
    
        $this->assertDatabaseHas('unit_of_measures', ['name' => 'Ton']);
    }
    
}
