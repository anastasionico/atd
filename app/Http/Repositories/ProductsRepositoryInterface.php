<?php

namespace App\Http\Repositories;

use Illuminate\Support\Collection;

interface ProductsRepositoryInterface {
    public function index(array $request) :Collection;

    public function find(array $request) :Collection;
}
