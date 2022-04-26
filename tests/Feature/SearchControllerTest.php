<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SearchControllerTest extends TestCase
{
    public $apiResponseObj;

    public function setUp(): void
    {
        parent::setUp();
        $apiResponse = Http::get('https://www.attraction-tickets-direct.co.uk/api/products');
        $this->apiResponseObj = json_decode($apiResponse->body());
    }

    public function test_search_endpoint_is_successful()
    {
        $response = $this->get('/search');

        $response->assertStatus(200);
    }

    public function test_see_details_in_table()
    {
        $appResponse = $this->get('/search');

        for ($i=0; $i<10 ; $i++) {
            $appResponse->assertSee($this->apiResponseObj->data[$i]->title, $escaped = true);
            $appResponse->assertSee($this->apiResponseObj->data[$i]->dest, $escaped = true);
        }
    }

    public function test_search_endpoint_with_title_is_successful()
    {
        $response = $this->get('/search?title=visit');

        $response->assertStatus(200);

        $this->assertGreaterThanOrEqual(10, substr_count($response->getContent(), 'visit'));
        $response->assertSee('visit', true);
    }

    public function test_search_endpoint_with_attributes_is_successful()
    {
        $response = $this->get('/search?title=cirque&geo=de-de&limit=1&offset=0');

        $response->assertStatus(200);


        $this->assertEquals(1, substr_count($response->getContent(), 'cirque'));
    }

    public function test_search_endpoint_with_attributes_does_not_return_other_titles()
    {
        $response = $this->get('/search?title=cirque&geo=de-de&limit=1&offset=0');

        $response->assertStatus(200);

        $this->assertEquals(0, substr_count($response->getContent(), 'disney'));
        $response->assertSee('cirque', true);
    }
}
