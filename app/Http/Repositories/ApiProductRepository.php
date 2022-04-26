<?php

namespace App\Http\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Exception;

class ApiProductRepository Implements ProductsRepositoryInterface
{
    protected const TIMEOUT_LIMIT = 10;
    protected const SITE_URI = 'attraction-tickets-direct.co.uk';

    /**
     * @param array $request
     * @return Collection
     * @throws Exception
     */
    public function index(array $request) :Collection
    {
        $response = Http::timeout(self::TIMEOUT_LIMIT)
            ->retry(3, 100)
            ->get(Self::SITE_URI . '/api/products', $request);

        if ($response->clientError() === true) {
            throw new Exception("No products found");
        }

        return collect($response->body());
    }

    /**
     * @param array $request
     * @return Collection
     * @throws Exception
     */
    public function find(array $request) :Collection
    {
        $response = Http::timeout(self::TIMEOUT_LIMIT)
            ->retry(3, 100)
            ->get(Self::SITE_URI . '/api/products/' . $request['id']);

        if ($response->clientError() === true) {
            throw new Exception("No products found");
        }

        return collect($response->body());
    }
}
