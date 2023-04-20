<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Book\StoreBookRequest;
use App\Services\Contracts\BookServiceInterface;

class BookController extends ApiController
{
    public function __construct(private BookServiceInterface $service)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->result($this->service->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();

        return $this->result($this->service->store($data));
    }
}
