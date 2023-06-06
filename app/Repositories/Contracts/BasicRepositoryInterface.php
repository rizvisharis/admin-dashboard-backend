<?php

namespace App\Repositories\Contracts;

interface BasicRepositoryInterface
{
    public function create($request);

    public function get($request = null);

    public function find($id);

    public function update($id);

    public function delete($id);
}
