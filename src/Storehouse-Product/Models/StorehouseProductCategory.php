<?php

namespace ResultSystems\Storehouse\Models\Storehouse;

use Illuminate\Database\Eloquent\Model;

class StorehouseProductCategory extends Model
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = \Auth::user();
            $model->created_by = $user->Id;
            $model->updated_by = $user->Id;
        });
        static::updating(function ($model) {
            $model->updated_by = \Auth::user()->Id;
        });
    }
}
