<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class Repository
{
    abstract protected function model(): Model;

    public function create(array $data)
    {
        return $this->model()::create($data);
    }

    public function update(Model $model, $data)
    {
        return $model->update($data);
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }
}
