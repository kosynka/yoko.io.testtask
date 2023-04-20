<?php

namespace App\Services\Contracts;

interface BookServiceInterface
{
	public function index();
	
	public function store(array $data);
}
