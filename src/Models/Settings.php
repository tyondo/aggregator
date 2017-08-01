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
        //return self::where('setting_name','blog_title')->get();
    }
    /**
     * Get the value of the Blog SEO.
     *
     * return @string
     */
    public static function blogAuthor()
    {
        return self::getByName('blog_author');
        //return self::where('setting_name','blog_author')->get();
    }
    /**
     * Get the value of the Blog SEO.
     *
     * return @string
     */
    public static function blogSeo()
    {
        return self::getByName('blog_seo');
        //return self::where('setting_name','blog_author')->get();
    }
    /**
     * Get the value of the Blog SEO.
     *
     * return @string
     */
    public static function blogDescription()
    {
        return self::getByName('blog_description');
        //return self::where('setting_name','blog_author')->get();
    }
    /**
     * Get the value of the Google Analytics Tracking ID.
     *
     * return @string
     */
    public static function gaId()
    {
        return self::getByName('ga_id');
        //return self::where('setting_name','ga_id')->get();
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
    /**
     * Get the value settings by name.
     *
     * @param string $settingName
     * @return string
     */
    public static function getByName($settingName)
    {
        return self::where('setting_name', $settingName)->pluck('setting_value')->first();
    }

}
