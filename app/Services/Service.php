<?php 

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class Service
{
    abstract protected function model(): Model;
}
