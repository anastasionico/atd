<?php

namespace App\Http\Services;

use Illuminate\Support\Collection;

interface ServiceInterface {
    public function index(array $request) :Collection;

    public function show(array $request) :Collection;
}
