<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Services\ServiceInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\View\View;


class SearchController extends Controller
{
    protected $service;

    /**
     * SearchController constructor.
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param SearchRequest $request
     * @return View
     */
    public function __invoke(SearchRequest $request) :View
    {
        try {
            $response = $this->service->index($request->validated());
        } catch (Exception $exception) {
            return 'Item not found';
        } catch (ConnectionException $exception) {
            return 'the API call too too long';
        }

        return view('search.search', [
            'products' => json_decode($response->get(0))->data
        ]);
    }
}
