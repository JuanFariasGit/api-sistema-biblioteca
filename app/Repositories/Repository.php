<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class Repository
{
    abstract protected function model(): Model;

    public function all(): Collection
    {
        return $this->model()::all();
    }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model()::paginate($perPage);
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
