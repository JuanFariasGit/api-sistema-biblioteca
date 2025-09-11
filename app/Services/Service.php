<?php 

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class Service
{
    public function __construct(private Model $model) 
    {
    }

    public function create(array $data)
    {
        return $this->model::create($data);
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
