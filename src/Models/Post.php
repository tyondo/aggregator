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
        /**
         * Get the tags relationship.
         *
         * @return BelongsToMany
         */
        public function tags()
        {
            return $this->belongsToMany(config('aggregator.namespace').'post_tag')->withTimestamps();
        }
        /**
         * Sync tag relationships and add new tags as needed.
         *
         * @param array $tags
         */
        public function syncTags(array $tags)
        {
            Tag::addNeededTags($tags);
            if (count($tags)) {
                $this->tags()->sync(
                    Tag::whereIn('tag', $tags)->pluck('id')->all()
                );

                return;
            }
            $this->tags()->detach();
        }
}
