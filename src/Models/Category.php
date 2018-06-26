<?php

namespace Tyondo\Aggregator\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(config('aggregator.namespace').'Post','category_id');
    }
}
