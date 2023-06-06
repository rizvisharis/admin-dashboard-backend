<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\BasicRepositoryInterface;

class BasicRepository implements BasicRepositoryInterface
{
    protected $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get($condition = null)
    {
        return $this->model->where($condition);
    }

    public function create($requestData)
    {
        return $this->model->create($requestData);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($data)
    {
        $data->save();
    }

    public function delete($data)
    {
        $data->delete();
    }
}