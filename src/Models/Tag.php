<?php

namespace Tyondo\Aggregator\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = ['id'];
    /**
     * Searchable items.
     *
     * @var array
     */
    public $searchable = [
        'tag',
        'title',
        'subtitle',
        'meta_description',
    ];

        /**
         * Get the posts relationship.
         *
         * @return BelongsToMany
         */
        public function posts()
        {
            return $this->belongsToMany(config('aggregator.namespace').'post_tag')->withTimestamps();
        }
        /**
         * Add tags from the list.
         *
         * @param array $tags List of tags to check/add
         */
        public static function addNeededTags(array $tags)
        {
            if (count($tags) === 0) {
                return;
            }
            $found = static::whereIn('tag', $tags)->pluck('tag')->all();
            foreach (array_diff($tags, $found) as $tag) {
                static::create([
                    'tag' => $tag,
                    'title' => $tag,
                    'subtitle' => 'Subtitle for '.$tag,
                    'meta_description' => '',
                    'reverse_direction' => false,
                ]);
            }
        }
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
