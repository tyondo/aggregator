<?php

namespace Tyondo\Aggregator\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
			'category_id', 'photo_id', 'title',
			'body', 'status','slug', 'summary',
		];

		public function user()
		{
			return $this->belongsTo(config('aggregator.namespace').'User');
		}
		public function photo()
		{
			return $this->belongsTo(config('aggregator.namespace').'Photo');
		}
		public function category()
		{
			return $this->belongsTo(config('aggregator.namespace').'Category');
		}
}
