<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BookRepositoryInterface
{
	public function all(): ?Collection;

	public function store(array $data): Model;

	public function findMany(array $data): ?Collection;
}
