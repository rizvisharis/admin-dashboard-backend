<?php

namespace App\Repositories;

use App\Models\Record;
use App\Repositories\Contracts\RecordRepositoryInterface;

class RecordRepository extends BasicRepository implements RecordRepositoryInterface
{
    public function __construct(Record $model)
    {
        $this->model = $model;
    }
}