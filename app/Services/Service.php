<?php 

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class Service
{
    abstract protected function model(): Model;

    public function findById(string $id): ?Model
    {
        return $this->model()::find($id);
    }

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
