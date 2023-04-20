<?php

namespace App\Services\V1;

use App\Repositories\Contracts\BookRepositoryInterface;
use App\Services\Contracts\BookServiceInterface;
use App\Http\Resources\BookResource;
use App\Services\BaseService;

class BookService extends BaseService implements BookServiceInterface
{
    public function __construct(private BookRepositoryInterface $repository)
    {
        //
    }

    public function index()
    {
        $books = $this->repository->all();

        return $this->result(
            data: ['book' => BookResource::collection($books)],
            statusCode: 200
        );
    }

    public function store(array $data)
    {
        $data = $this->prepareData($data);

        $bookIds = array();

        foreach ($data as $book) {
            $temp = $this->repository->store($book)->id;
            array_push($bookIds, $temp);
        }

        $books = $this->repository->findMany($bookIds);

        return $this->result(
            data: ['book' => BookResource::collection($books)],
            statusCode: 200
        );
    }

    private function prepareData($data): array
    {
        $preparedData = array();

        foreach ($data as $value) {
            $value = (array) json_decode($value);
            $value = $this->revealWrapping($value);
            $value = $this->convertToArray($value);
            $value = $this->renameKeys($value);

            $preparedData = array_merge($preparedData, $value);
        }
        
        return $preparedData;
    }

    private function revealWrapping(array $data, $field = 'data')
    {
        if (isset($data[$field])) {
            return $data = $data[$field];
        }

        return $data;
    }

    private function convertToArray(&$data) {
        foreach ($data as $key => $value) {
            if (is_object($value)) {
                $arr[$key] = get_object_vars($value);
            }

            if (is_array($value)) {
                $arr[$key] = array_map(__FUNCTION__, $value);
            }
        }

        return $arr;
    }

    private function renameKeys(&$data) {
        $data = array_map(function($data) {
            return array(
                'name' => isset($data['title']) ? $data['title'] : $data['name'],
                'author' => isset($data['author']) ? $data['author'] : null,
                'description' => isset($data['descr']) ? $data['descr'] : $data['description'],
                'created_at' => isset($data['createdAt']) ? $data['createdAt'] : null,
            );
        }, $data);

        return $data;
    }
}
