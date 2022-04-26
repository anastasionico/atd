<?php

namespace App\Http\Services;

use App\Http\Repositories\ProductsRepositoryInterface;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

class ProductService implements ServiceInterface
{
    protected const DEFAULT_LOCALE = 'en';

    protected $repository;

    /**
     * ProductService constructor.
     * @param ProductsRepositoryInterface $repository
     */
    public function __construct(ProductsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $request
     * @return Collection
     */
    public function index(array $request) :Collection
    {
        $request['geo'] = $this->setGeo($request);

        return $this->repository->index($request);
    }

    /**
     * @param array $request
     * @return Collection
     */
    public function show(array $request) :Collection
    {
        return $this->repository->find($request);
    }

    /**
     * @param array $request
     * @return string|null
     */
    private function setGeo(array $request) : string
    {
        if (array_key_exists('geo', $request) === true) {
            return $request['geo'];
        }

        return self::DEFAULT_LOCALE;
    }
}
