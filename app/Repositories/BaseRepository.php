<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): ?Collection
    {
        return $this->model->all();
    }

    public function store(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
}
