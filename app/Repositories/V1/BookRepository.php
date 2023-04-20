<?php

namespace App\Repositories\V1;

use App\Models\Book;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    public function findMany(array $data): ?Collection
    {
        return $this->model->whereIn('id', $data)->get();
    }
}
