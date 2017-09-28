<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

trait ModelValidate
{
    protected $errors = [];

    public function getErrors()
    {
        return $this->errors;
    }

    public static function rules()
    {
        return [];
    }

    public static function messages()
    {
        return [];
    }

    /**
     * Валидация на уровне модели во время ее создания
     */
    public static function boot()
    {
        static::creating(function (Model $model) {
            if( ! $model->validate() ){
                return false;
            }
        });
    }

    protected function validate()
    {
        $validator = Validator::make($this->attributes, static::rules(), static::messages());

        if ($validator->fails()) {
            $this->setErrors($validator->messages());
            return false;
        }

        return true;
    }

    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }
}