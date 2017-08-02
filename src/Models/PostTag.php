<?php

namespace Tyondo\Aggregator\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $fillable = ['post_id','tag_id','created_at','updated_at'];
    protected $table = 'post_tag';

    /**
     * Get the posts relationship.
     *
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(config('aggregator.namespace').'Post','post_tag','post_id')->withTimestamps();
    }
}
