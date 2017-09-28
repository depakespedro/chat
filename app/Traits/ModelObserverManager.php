<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

trait ModelObserverManager
{
    protected $model = null;

    public function setModel(Model $model)
    {
        return $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

}