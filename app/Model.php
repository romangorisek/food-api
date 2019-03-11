<?php

namespace App;

use Illuminate\Database\Eloquent\Model as ElModel;
use Ramsey\Uuid\Uuid;

class Model extends ElModel
{
    public $incrementing = false;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if (!isset($model->attributes["id"])) {
                $model->attributes["id"] = Uuid::uuid4()->toString();
            }
        });
    }
}
