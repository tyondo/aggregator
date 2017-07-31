<?php

namespace Tyondo\Aggregator\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['id','setting_name','setting_value'];

    /**
     * Get the value of the Blog Subtitle.
     *
     * return @string
     */
    public static function blogTitle()
    {
        return self::getByName('blog_title');
    }
    /**
     * Get the value of the Blog SEO.
     *
     * return @string
     */
    public static function blogAuthor()
    {
        return self::getByName('blog_author');
    }
    /**
     * Get the value of the Google Analytics Tracking ID.
     *
     * return @string
     */
    public static function gaId()
    {
        return self::getByName('ga_id');
    }
    /**
     * Return the Twitter card type selected by the user.
     *
     * May be either of 'summary', 'summary_large_image' or 'none'
     *
     * return @string
     */
    public static function twitterCardType()
    {
        return $twitterCardType = self::where('setting_name', 'twitter_card_type')->pluck('setting_value')->first();
    }

}
