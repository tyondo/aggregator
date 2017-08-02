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
		public function category()
		{
			return $this->hasOne(config('aggregator.namespace').'Category','id','category_id');
		}
        /**
         * Get the tags relationship.
         *
         * @return BelongsToMany
         */
        public function tags()
        {
            return $this->belongsToMany(config('aggregator.namespace').'Tag','post_tag','post_id','tag_id')->withTimestamps();
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
