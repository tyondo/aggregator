<?php

namespace Tyondo\Aggregator\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

		public function user()
		{
			return $this->belongsTo(config('aggregator.namespace').'User');
		}
		public function photo()
		{
			return $this->hasOne(config('aggregator.namespace').'Photo','id','featured_image_id');
		}
		public function category()
		{
			return $this->belongsTo(config('aggregator.namespace').'Category');
		}
}
