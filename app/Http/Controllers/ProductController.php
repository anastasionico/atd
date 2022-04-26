<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Services\ServiceInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    protected $service;

    /**
     * ProductController constructor.
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function __invoke(ProductRequest $request) :JsonResponse
    {
        try {
            $response = $this->service->show($request->validated());
        } catch (Exception $exception) {
            return 'Item not found';
        } catch (ConnectionException $exception) {
            return 'the API call too too long';
        }

        return response()->json(json_decode($response->get(0), true));
    }
}
