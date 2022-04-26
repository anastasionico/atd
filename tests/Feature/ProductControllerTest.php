<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    public $apiResponseObj;

    public function setUp(): void
    {
        parent::setUp();
        $apiResponse = Http::get('https://www.attraction-tickets-direct.co.uk/api/products');
        $this->apiResponseObj = json_decode($apiResponse->body());
    }

    public function test_product_endpoint_is_successful()
    {
        $id = (int) $this->apiResponseObj->data[0]->id;
        $response = $this->getJson("/api/products/$id");

        $response
            ->assertStatus(200)
            ->assertJson([
                             'id' => $id,
                             'title' => 'Visit to the Cutty Sark and Afternoon Tea for Two - Experience Voucher',
                             'updated' => '2022-03-31 14:44:55',
                             'attraction_id' => '237623',
                             'attraction_title' => 'Visit to the Cutty Sark and Afternoon Tea for Two - Experience Voucher',
                             'dest' => 'London',
                         ]);
    }
}
