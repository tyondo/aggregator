<?php

namespace Tyondo\Aggregator;


use function Composer\Autoload\includeFile;

class Aggregator
{
    public static function routes()
    {
        includeFile(__DIR__.'/../Routes/web.php');
    }
    public static function youtubeVideo($videoLink, $type=null)
    {
        //regrex source: https://linuxpanda.wordpress.com/2013/07/24/ultimate-best-regex-pattern-to-get-grab-parse-youtube-video-id-from-any-youtube-link-url/
        // YouTube video url
        //Video id is 11 characters in length
        $video_pattern = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i';

        $videoId = preg_replace($video_pattern, '$1', $videoLink);
        if (isset($type)){
            $thumbURL = 'https://www.youtube.com/embed/'.$videoId;
           // "https://www.youtube.com/embed/fxQcBKUPm8o";
        }else{
            $thumbURL = 'http://img.youtube.com/vi/'.$videoId.'/0.jpg';
        }
        //return '<img src="'. $thumbURL . '" >';
        return "$thumbURL";
    }
    public static function youtubeVideoStatic($playlistLink){
        //Playlist id is 12 or more characters in length
        $playlist_pattern = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{12,})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
        $videoId = preg_replace($playlist_pattern, '$1', $playlistLink);
        $thumbURL = 'http://img.youtube.com/vi/'.$videoId.'/0.jpg';
        //return '<img src="'. $thumbURL . '" >';
        return "$thumbURL";
    }
    public static function vimeoVideo(){
        $videoId             =  128122927;
        $thumbnail_size = ‘thumbnail_small’;

        $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$videoId.php"));

        return $hash[0][$thumbnail_size];
        /*
          return $hash[0]["thumbnail_small"];
          return $hash[0]["thumbnail_medium"];
          return $hash[0]["thumbnail_large"];
        */
    }

}