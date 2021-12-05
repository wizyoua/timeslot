<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CrudTest extends TestCase
{
    /** @test */
    public function visit_homepage()
    {
        $response = $this->get('/');


        $response->assertStatus(200);
    }

    /** @test */
    public function create_timeslot()
    {
        $response = $this->postJson('/create', [
            
            'id' => 1,
            'title' => "test",
            'start_time' => '2019-12-12 12:00:00',
            'end_time' => '2019-12-12 13:00:00',
            "start_date" => "2019-12-12",
            "end_date" => "2019-12-12",
            "cancel_state" => "0",
            "created_at" => "2019-12-12 12:00:00",
            "updated_at" => "2019-12-12 12:00:00",

        ]);

        $response
            ->assertStatus(200);
    }

    /** @test */
    public function update_timeslot()
    {
        $response = $this->postJson('/edit/update/11', [
            'id' => 11,
            'title' => "test_updated",
            'start_time' => '2019-12-12 12:00:00',
            'end_time' => '2019-12-12 13:00:00',
            "start_date" => "2019-12-12",
            "end_date" => "2019-12-12",
            "cancel_state" => "0",
            "created_at" => "2019-12-12 12:00:00",
            "updated_at" => "2019-12-12 12:00:00",

        ]);

        $response
            ->assertStatus(200);
    }

    /** @test */
    public function cancel_timeslot()
    {
        $response = $this->postJson('timeslot/delete/11', [
            'id' => 11,
            'title' => "test_updated",
            'start_time' => '2019-12-12 12:00:00',
            'end_time' => '2019-12-12 13:00:00',
            "start_date" => "2019-12-12",
            "end_date" => "2019-12-12",
            "cancel_state" => "0",
            "created_at" => "2019-12-12 12:00:00",
            "updated_at" => "2019-12-12 12:00:00",

        ]);

        $response
            ->assertStatus(200);
    }

    
}
