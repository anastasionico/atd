<?php

namespace Tests\Unit;

use App\Http\Services\ProductService;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Mockery;

class ProductServiceTest extends TestCase
{
    protected $ApiProductRepository;
    public function setUp(): void
    {
        parent::setUp();
        $this->ApiProductRepository = Mockery::mock('App\Http\Repositories\ApiProductRepository', 'App\Http\Repositories\ProductsRepositoryInterface');
    }

    public function test_service_index_returns_the_correct_response()
    {
        $responseStub = [
            'meta' => [
                'count' => 10,
                'total_count' => 749,
                'limit' => 10,
                'offset' => 0,
                'sale_cur' => 'GBP',
            ],
            'data' => [
                0 => [
                    'id' => '237624',
                    'title' => 'Visit to the Cutty Sark and Afternoon Tea for Two - Experience Voucher',
                    'updated' => '2022-03-31 14:44:55',
                    'dest' => 'London',
                    'price_from_adult' => '72.00',
                    'price_from_child' => '72.00',
                    'rrp_adult' => '',
                    'rrp_child' => '',
                    'price_from_all' => [
                        0 => [
                            'desc' => 'General',
                            'price_from' => '72.00',
                            'rrp' => '',
                            'type_description' => 'valid for 2 persons',
                        ],
                    ],
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/_visit_to_the_cutty_sark_and_afternoon_tea_for_two_-_experience_voucher/visit-to-the-cutty-23114914.jpg',
                ],
                1 => [
                    'id' => '4471',
                    'title' => '\'O\' Cirque du Soleil Tickets',
                    'updated' => '2021-12-21 14:45:59',
                    'dest' => 'Las Vegas',
                    'price_from_adult' => '117.00',
                    'price_from_child' => '117.00',
                    'rrp_adult' => '',
                    'rrp_child' => '',
                    'price_from_all' => [
                        0 => [
                            'desc' => 'General',
                            'price_from' => '117.00',
                            'rrp' => '',
                            'type_description' => 'Category D',
                        ],
                    ],
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/039o039_cirque_du_soleil_tickets/o.jpg',
                ],
                2 => [
                    'id' => '280865',
                    'title' => '1-Day Hop-On Hop-Off & Alcatraz',
                    'updated' => '2022-04-17 10:59:46',
                    'dest' => 'San Francisco',
                    'price_from_adult' => '94.00',
                    'price_from_child' => '72.00',
                    'rrp_adult' => '',
                    'rrp_child' => '',
                    'price_from_all' => [
                        0 => [
                            'desc' => 'Adult',
                            'price_from' => '94.00',
                            'rrp' => '',
                            'type_description' => '',
                        ],
                        1 => [
                            'desc' => 'Child',
                            'price_from' => '72.00',
                            'rrp' => '',
                            'type_description' => '5-11yrs',
                        ],
                    ],
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/alcatraz_and_all_loops_double_decker_tour/alcatraz.jpg',
                ],
                3 => [
                    'id' => '24132',
                    'title' => '1-Hour Paris Sightseeing Cruise',
                    'updated' => '2022-04-12 10:06:08',
                    'dest' => 'Paris',
                    'price_from_adult' => '10.00',
                    'price_from_child' => '6.00',
                    'rrp_adult' => '15.00',
                    'rrp_child' => '',
                    'price_from_all' => [
                        0 => [
                            'desc' => 'Adult',
                            'price_from' => '10.00',
                            'rrp' => '15.00',
                            'type_description' => '',
                        ],
                        1 => [
                            'desc' => 'Child',
                            'price_from' => '6.00',
                            'rrp' => '',
                            'type_description' => '3-12yrs',
                        ],
                    ],
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/paris_sightseeing_cruise/paris_sightseeing_cruise2.jpg',
                ],
                4 => [
                    'id' => '4390',
                    'title' => '2 Day Disneyland California Hopper Ticket',
                    'updated' => '2022-01-12 12:00:21',
                    'dest' => 'Anaheim',
                    'price_from_adult' => '239.00',
                    'price_from_child' => '227.00',
                    'rrp_adult' => '0.00',
                    'rrp_child' => '0.00',
                    'price_from_all' => [
                        0 => [
                            'desc' => 'Adult',
                            'price_from' => '239.00',
                            'rrp' => '0.00',
                            'type_description' => '10yrs+',
                        ],
                        1 => [
                            'desc' => 'Child',
                            'price_from' => '227.00',
                            'rrp' => '0.00',
                            'type_description' => '3-9yrs',
                        ],
                    ],
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/2_day_disneyland_california_hopper_ticket/disney_california_tickets2.jpg',
                ],
                5 => [
                    'id' => '232086',
                    'title' => '2 Day Disneyland California One Park Per Day Ticket',
                    'updated' => '2022-01-19 13:18:38',
                    'dest' => 'Anaheim',
                    'price_from_adult' => '195.00',
                    'price_from_child' => '184.00',
                    'rrp_adult' => '0.00',
                    'rrp_child' => '0.00',
                    'price_from_all' => [
                        0 => [
                            'desc' => 'Adult',
                            'price_from' => '195.00',
                            'rrp' => '0.00',
                            'type_description' => '',
                        ],
                        1 => [
                            'desc' => 'Child',
                            'price_from' => '184.00',
                            'rrp' => '0.00',
                            'type_description' => '3-9yrs',
                        ],
                    ],
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/2_day_disneyland_california_1_park_per_day_ticket/disney_california_tickets.jpg',
                ],
                6 => [
                    'id' => '2031',
                    'title' => '2-Day Hop-On Hop-Off & Alcatraz',
                    'updated' => '2022-04-14 08:26:21',
                    'dest' => 'San Francisco',
                    'price_from_adult' => '114.00',
                    'price_from_child' => '83.00',
                    'rrp_adult' => '',
                    'rrp_child' => '',
                    'price_from_all' => [
                        0 => [
                            'desc' => 'Adult',
                            'price_from' => '114.00',
                            'rrp' => '',
                            'type_description' => '',
                        ],
                        1 => [
                            'desc' => 'Child',
                            'price_from' => '83.00',
                            'rrp' => '',
                            'type_description' => '5-11yrs',
                        ],
                    ],
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/alcatraz_and_all_loops_double_decker_tour/alcatraz.jpg',
                ],
                7 => [
                    'id' => '562',
                    'title' => '2-Park SeaWorld and Aquatica Ticket',
                    'updated' => '2022-02-28 16:21:12',
                    'dest' => 'Orlando',
                    'price_from_adult' => '147.00',
                    'price_from_child' => '142.00',
                    'rrp_adult' => '',
                    'rrp_child' => '',
                    'price_from_all' => [
                        0 => [
                            'desc' => 'Adult',
                            'price_from' => '147.00',
                            'rrp' => '',
                            'type_description' => '10yrs+',
                        ],
                        1 => [
                            'desc' => 'Child',
                            'price_from' => '142.00',
                            'rrp' => '',
                            'type_description' => '3-9yrs',
                        ],
                    ],
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/2-park_seaworld_and_aquatica_ticket/2-park_0.png',
                ],
                8 => [
                    'id' => '561',
                    'title' => '2-Park SeaWorld and Busch Gardens Ticket',
                    'updated' => '2022-02-28 16:17:50',
                    'dest' => 'Orlando',
                    'price_from_adult' => '147.00',
                    'price_from_child' => '142.00',
                    'rrp_adult' => '',
                    'rrp_child' => '',
                    'price_from_all' => [
                        0 => [
                            'desc' => 'Adult',
                            'price_from' => '147.00',
                            'rrp' => '',
                            'type_description' => '10yrs+',
                        ],
                        1 => [
                            'desc' => 'Child',
                            'price_from' => '142.00',
                            'rrp' => '',
                            'type_description' => '3-9yrs',
                        ],
                    ],
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/2-park_seaworld_and_busch_gardens_ticket/2-park-ticket-sw-bg_0.jpg',
                ],
                9 => [
                    'id' => '4391',
                    'title' => '3 Day Disneyland California Hopper Ticket',
                    'updated' => '2022-01-19 13:14:32',
                    'dest' => 'Anaheim',
                    'price_from_adult' => '292.00',
                    'price_from_child' => '271.00',
                    'rrp_adult' => '0.00',
                    'rrp_child' => '0.00',
                    'price_from_all' => [
                        0 => [
                            'desc' => 'Adult',
                            'price_from' => '292.00',
                            'rrp' => '0.00',
                            'type_description' => '10yrs+',
                        ],
                        1 => [
                            'desc' => 'Child',
                            'price_from' => '271.00',
                            'rrp' => '0.00',
                            'type_description' => '3-9yrs',
                        ],
                    ],
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/3_day_disneyland_california_hopper_ticket/disney_california2_0.jpg',
                ],
            ],
        ];

        $this->ApiProductRepository->shouldReceive('index')
            ->with(['geo' => 'en'])
            ->andReturn(collect($responseStub));

        $ProductService = new ProductService($this->ApiProductRepository);
        $response = $ProductService->index(['geo' => 'en']);

        $this->assertEquals($responseStub['data'][0]['id'], $response['data'][0]['id']);
        $this->assertEquals($responseStub['data'][0]['title'], $response['data'][0]['title']);
        $this->assertEquals($responseStub['data'][0]['dest'], $response['data'][0]['dest']);
    }

    public function test_service_show_returns_the_correct_response()
    {
        $responseStub = [
            'id' => '237624',
            'title' => 'Visit to the Cutty Sark and Afternoon Tea for Two - Experience Voucher',
            'updated' => '2022-03-31 14:44:55',
            'attraction_id' => '237623',
            'attraction_title' => 'Visit to the Cutty Sark and Afternoon Tea for Two - Experience Voucher',
            'dest' => 'London',
            'attractions' => [
                0 => [
                    'id' => '237623',
                    'title' => 'Visit to the Cutty Sark and Afternoon Tea for Two - Experience Voucher',
                    'logo' => '',
                ],
            ],
            'desc' => '<p>On arrival at the Cutty Sark, you and a lucky guest will be able to take your time exploring this award-winning attraction. Brimming with British history, stunning views and specially arranged activities, there’s plenty of ways to make a visit to the Cutty Sark a memorable one.</p><p>As part of your experience, you can enjoy afternoon tea under the world’s last surviving tea clipper. Tuck into a delightful array of homemade scones, cakes and sandwiches, finished off with a pot of Cutty Sark tea.</p><p>This experience is a great idea for a gift, as you don’t have to commit the recipient to a particular date – the choice is theirs! A voucher which will be uploaded to your customer account. Simply follow the instructions on your voucher to book your experience. Your voucher is open-dated and valid for 12 months.</p>',
            'desc_short' => 'Step aboard a piece of British nautical history with a tour and afternoon tea on the legendary 19th century clipper, the Cutty Sark. Now an award-winning visitor attraction in Greenwich, the Cutty Sark was one of the fastest ships in her prime.  During your visit enjoy an afternoon tea under the world\'s last surviving tea clipper.',
            'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/ticket_description/_visit_to_the_cutty_sark_and_afternoon_tea_for_two_-_experience_voucher/visit-to-the-cutty-23114914.jpg',
            'img_med' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/470-352/ticket_description/_visit_to_the_cutty_sark_and_afternoon_tea_for_two_-_experience_voucher/visit-to-the-cutty-23114914.jpg',
            'faq' => '',
            'conditions' => '<ul><li>Under 18s must be accompanied by a paying adult</li><li>Cutty Sark is wheelchair accessible with lifts providing access throughout the ship. Wheelchair spaces are limited to three visitors at any time and must be pre-booked when making your booking. Some areas are not wheelchair accessible, but virtual access is provided to these spaces</li><li>The lift is restricted due to the ship\'s structure, so mobility scooters cannot be accommodated onboard</li><li>There are steps and gradients in Cutty Sark Gardens on the approach to the ship</li><li>There is step-free access from King William Walk and Greenwich Pier</li><li>This experience is available seven days a week from 10.00 to 17.00 (last admission at 16.15). Afternoon tea is serves daily from 12.00 to 15.30. Excluded dates including 14 February, 10 March, 24 to 26 and 31 December will apply.</li><li>We recommend you book at least 1 week in advance to ensure that dates are available. All bookings are subject to availability.</li><li>Please allow 3 hours to a day for the full experience.</li><li>The experience content and restrictions may vary. Please check with the venue when booking.</li><li>Once you make a booking with the Experience Operator, you are bound by their terms and conditions. Make sure you understand their rules regarding changing a booking (particularly at short notice) as amendments may not be possible in the case of infringement of these rules.</li><li>A cancellation indemnity, subject to terms, is included with every voucher. The Cancellation Indemnity policy may provide a replacement voucher in the event of cancellation by the participant owing to circumstances beyond their control.</li><li>Your voucher is valid for 12 months from the date of purchase regardless of departure date entered. It is your responsibility to have booked and taken your experience before the expiry date.</li><li>Full Payment is required at the time of booking. Experience vouchers will be issued on confirmation of payment.</li><li><strong>Cancellation Policy: Experience vouchers can be cancelled with a full refund if cancelled within 30 days of purchase. Experience vouchers are non-refundable after 30 days of purchase and 100% cancellation charges will apply.</strong></li><li><strong>Please Note: It can take up to 72 hours to receive documentation.</strong></li></ul>',
            'ticket_includes' => '<ul><li>Entrance to the Cutty Sark for two</li><li>Audio Guide - available in English, French, German, Spanish, Italian, Brazilian Portuguese, Russian, Mandarin, Japanese &amp; Korean</li><li>Award-winning visitor attraction</li><li>Afternoon tea under the Cutty Sark</li> </ul>',
            'ticket_excludes' => '<ul><li>Additional Refreshments</li><li>Souvenirs</li> </ul>',
            'departure_location' => 'London - Greenwich',
            'departure_time' => 'This experience is available seven days a week from 10.00 to 17.00 (last admission at 16.15). Afternoon tea is serves daily from 12.00 to 15.30. Excluded dates including 14 February, 10 March, 24 to 26 and 31 December will apply.',
            'checkin_time' => '',
            'start_time' => 'Open from 10am.',
            'duration' => 'Approximately 3 hours',
            'hotel_pickup' => '',
            'additional_info' => '',
            'num_days' => '',
            'seo_title' => 'Visit to the Cutty Sark and Afternoon Tea for Two - Experience Voucher',
            'benefits' => [
            ],
            'tags' => [
                0 => [
                    'id' => '5894',
                    'tag' => 'Excursions and Day Trips',
                    'category_id' => '19',
                    'category' => 'Attraction Product Type',
                    'parent_id' => '794',
                    'parent' => 'Experiences',
                ],
                1 => [
                    'id' => '794',
                    'tag' => 'Experiences',
                    'category_id' => '19',
                    'category' => 'Attraction Product Type',
                    'parent_id' => '',
                    'parent' => '',
                ],
                2 => [
                    'id' => '5892',
                    'tag' => 'Sightseeing',
                    'category_id' => '19',
                    'category' => 'Attraction Product Type',
                    'parent_id' => '794',
                    'parent' => 'Experiences',
                ],
                3 => [
                    'id' => '1065',
                    'tag' => 'London',
                    'category_id' => '2',
                    'category' => 'Destination',
                    'parent_id' => '1064',
                    'parent' => 'England',
                ],
                4 => [
                    'id' => '2293',
                    'tag' => 'In the city',
                    'category_id' => '24',
                    'category' => 'Do Something',
                    'parent_id' => '',
                    'parent' => '',
                ],
                5 => [
                    'id' => '4740',
                    'tag' => 'History & Culture',
                    'category_id' => '27',
                    'category' => 'DSD Legacy Activities',
                    'parent_id' => '',
                    'parent' => '',
                ],
            ],
            'photos' => [
                0 => [
                    'id' => '72517',
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-23114932.jpg',
                    'img_med' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/470-352/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-23114932.jpg',
                ],
                1 => [
                    'id' => '81679',
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-28090128_16x9.jpg',
                    'img_med' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/470-352/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-28090128_16x9.jpg',
                ],
                2 => [
                    'id' => '81680',
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-28090414.jpg',
                    'img_med' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/470-352/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-28090414.jpg',
                ],
                3 => [
                    'id' => '72515',
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-23114920.jpg',
                    'img_med' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/470-352/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-23114920.jpg',
                ],
                4 => [
                    'id' => '72514',
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-23114914.jpg',
                    'img_med' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/470-352/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-23114914.jpg',
                ],
                5 => [
                    'id' => '72516',
                    'img_sml' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/atd_list_thumb/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-23114926.jpg',
                    'img_med' => 'https://attraction-tickets-direct.co.uk/sites/default/files/imagecache/470-352/theme-park/visit-cutty-sark-and-afternoon-tea-two-experience-voucher/visit-to-the-cutty-23114926.jpg',
                ],
            ],
            'calendar_based_pricing' => 0,
            'calendar_based_multiple' => 0,
            'calendar_first_available_month' => '2022-04-01',
            'dates_required' => 0,
            'sale_cur' => 'GBP',
            'tickets' => [
                0 => [
                    'ticket_id' => '237625',
                    'product_id' => '237624',
                    'sku' => 'DSD237724',
                    'title' => ' Visit to the Cutty Sark and Afternoon Tea for Two - Experience Voucher  valid for 2 persons',
                    'type' => '',
                    'type_description' => 'valid for 2 persons',
                    'supplier_api_code' => '',
                    'supplier_api_id' => '77598',
                    'is_free' => 0,
                    'num_persons' => 2,
                    'min_age' => '0',
                    'max_age' => '',
                    'price_from' => '72.00',
                    'year' => '',
                    'grouping' => '',
                    'live_supplier_price' => '0',
                    'booking_type' => 'asynchronous',
                    'dispatch_methods' => [
                        0 => 'evoucher',
                    ],
                    'attributes' => [
                        0 => [
                            'attribute_id' => '237625-0-13',
                            'title' => 'Passenger name',
                            'type' => 'text',
                            'format' => '',
                            'required' => '1',
                            'required_for_booking' => '0',
                            'per_qty' => '0',
                            'tip' => '',
                            'backend_only' => '0',
                            'calendar_based' => '0',
                            'values' => [
                            ],
                        ],
                    ],
                ],
            ],
            'seasons' => [
            ],
            'related_products' => [
            ],
            'frequently_bought_with' => [
            ],
            'fulfilment_options' => [
                0 => [
                    'product_id' => 237624,
                    'type' => 'digital',
                ],
            ],
            'price_options' => [
            ],
        ];

        $this->ApiProductRepository->shouldReceive('find')
            ->with(['id' => '237624'])
            ->andReturn(collect($responseStub));

        $ProductService = new ProductService($this->ApiProductRepository);
        $response = $ProductService->show(['id' => '237624']);

        $this->assertEquals($responseStub['id'], $response['id']);
        $this->assertEquals($responseStub['title'], $response['title']);
        $this->assertEquals($responseStub['dest'], $response['dest']);
        $this->assertEquals($responseStub['attraction_id'], $response['attraction_id']);
        $this->assertEquals($responseStub['attraction_title'], $response['attraction_title']);
    }
}
