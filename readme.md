
##Production ready but still under ACTIVE development:

This is a blog package for laravel. Most of the packages available
tend to force the user to use an administration panel or have them
as the base package.

This package is meant to be dropped into an existing app to provide
blogging functionality with media management capability.

#Installation

The package can be used from laravel 5.3 and above. To install:

Run:
````
composer require tyondo/aggregator
````
in the config/app.php add:
````
Tyondo\Aggregator\TyondoAggregatorServiceProvider::class,
````
If you are a developer, you can contribute and extend by cloning it in:
packages/tyondo folder and then in your composer.json file add:

````
"Tyondo\\Aggregator\\": "packages/tyondo/aggregator/src/"
````
and then require the extra packages used by aggregator:

````
"laravelcollective/html": "5.3.1|5.4.1",
"unisharp/laravel-filemanager": "^1.8",
"intervention/image": "^2.4",
````

After either of the above steps. Run

````
php artisan aggregator:install
````
This will install the package fully

#Features
- Create different post types (standard, video, audio)
- Use of Tags
- Use of categories
- Generation of youtube video thumbnails
- Media manager for managing images, audios and videos
- Integrated media manager in the text editor (ckeditor used)
- Image resizing

#Pending features
1. Parametrizing the image resizing funtionality
2. Building blog API end points.
3. Blog settings
4. Blog user profile
5. Blog contributors

#Usage
###Accessing posts
There are several ways that you can retrive posts stored by the aggregator
1. All posts
 ```` $posts = \Tyondo\Aggregator\Models\Post::all() ````
2. Posts based on their type (published, draft, review, inactive)
```` $posts = \Tyondo\Aggregator\Models\Post::where('post_status','published')->get()````

####Post return fields and method
When you retrieve a given post you will have access to the following parameters and methods
* id
 * title
 * slug
 * subtitle
 * body
 * summary
 * meta_description
 * post_type
 * featured_content
 * is_published
 * user_id
 * post_status
 * category_id
 * featured_image
 * view_count
 * key_words
 * created_at
 * updated_at
 * category()
 * tags()
 * user()
 
 ###Using on a blog
1. How to access post author
 ````{{ucfirst($post->user->name)}} ````
2. How to access post category
```` {{$post->category->category}} ````
3. How to access post created time in human language
```` {{$post->created_at->diffForHumans()}} ````
4. How to access youtube thumbnail from featured content
````{{Aggregator::youtubeVideo($post->featured_content)}}````
5. How to get youtube iframe source link
````{{Aggregator::youtubeVideo($post->featured_content, true)}}````
6. How to access day when the post was created
````{{ $post->created_at->format('d')}}````
7. How to access month when post was created
````{{$post->created_at->format('M')}}````
8. How to access post tags
 ```` @foreach($post->tags->toArray() as $tag )
   <a href="{{$tag['id']}}">{{$tag['title']}}</a>
  @endforeach 
  ````                

