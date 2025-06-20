<?php

namespace App\Services;

use App\Models\Publisher;
use Illuminate\Pagination\LengthAwarePaginator;

class PublisherService extends Service
{
    protected function model(): Publisher
    {   
        return app(Publisher::class);
    }

    public function all(): LengthAwarePaginator
    {
        return $this->model()::paginate(5);
    }

    public function findById(string $id): ?Publisher
    {
        return $this->model()::find($id);
    }

    public function create(array $data)
    {
        return $this->model()::create($data);
    }

    public function update(Publisher $publisher, $data)
    {
        return $publisher->update($data);
    }

    public function delete(Publisher $publisher)
    {
        return $publisher->delete();
    }
} 
