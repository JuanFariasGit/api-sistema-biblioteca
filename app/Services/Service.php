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
        if ($model->update($data)) {
            return $this->model()::find($model->id);
        }
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }
}
