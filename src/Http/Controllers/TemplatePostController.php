<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;

class TemplatePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get 5 latest posts from db that are active
        $posts = Post::where('active', 1)->orderBy('created_at', 'desc')->paginate(4);
      $css = (object)array('openDropdown' => 'open', 'linkActive' => 'active', 'posts'=> 'posts');
        //return view('posts.show', compact('posts', 'post', 'css'));
      //  return $posts;
        return view('portal.posts.index', compact('posts', 'css'));
    }

    /**
     * Show the form for creating a new resource.
     *Take into consideration the user level
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //check if user is admin or author for them to Post
      //  if($request->user()->can_post()) //change to this after doing a fresh migration
        if(($request->user()->can_post()))
        {
          $css = (object)array('openDropdown' => 'open', 'linkActive' => 'active', 'posts'=> 'posts', 'createPosts' => 'btn btn-primary');
          return view('portal.posts.create', compact('css'));

        }else {
          return redirect('/')->withErrors('Sorry you dont have the rights to create posts');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
    //  return '<pre>'. $request. '</pre>' . '<br>' . $request->get('body') . $request->ip();

        $post = new Post;
        $post->title = $request->get('title');
        //$post->body = $request->get('body');
        $post->body = $this->summernoteImageProcessor($request);
        $post->featuredImage = $this->featuredImage($request);
        $post->slug = str_slug($post->title);
        $post->author_id = $request->user()->id;
          if($request->has('save'))
          {
            $post->active = 0;
            $message = 'Post Created';
          }else{
            $post->active = 1;
            $message = 'Post Published';
          }
        $post->save();

        return redirect('Posts/'. $post->slug .'/edit');
    }
    public function featuredImage($request)
    {

        $filename = uniqid();
        $mimetype = $request->file('featuredImage')->getClientOriginalExtension();
      //  $filepath = "/public/assets/images/postImages/$filename.$mimetype";
        $filepath = "assets\images\postFeaturedImages\\$filename.$mimetype" ;
        // @see http://image.intervention.io/api/
          $image = Image::make($request->file('featuredImage'))
              ->fit(800, 250)
              ->save(public_path($filepath));
        return $filepath;
    }
    public function summernoteImageProcessor($request){
            $message = $request->input('body'); // Summernote input field
            $dom = new \DOMDocument();
            $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            if(!empty($images))
            {
              // foreach <img> in the submited message
              foreach($images as $img){
                $src = $img->getAttribute('src');
                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){
                  // get the mimetype
                  preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                  $mimetype = $groups['mime'];

                  // Generating a random filename
                  $filename = uniqid();
                  $filepath = "/assets/images/postImages/$filename.$mimetype";

                  // @see http://image.intervention.io/api/
                  $image = Image::make($src)
                    ->encode($mimetype, 100) 	// encode file to the specified mimetype
                    ->save(public_path($filepath));

                  $new_src = asset($filepath);
                  $img->removeAttribute('src');
                  $img->setAttribute('src', $new_src);
                } // <!--endif
              } // <!--endforeach
              //Session::flash('message','Post updated!');
              return $dom->saveHTML();
            }else {
              //Session::flash('message','Post updated!');
              return $request->get('body');
            }
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug (post slug instead of id)
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if(!$post)
        {
          return redirect('/')->withErrors('Post not found');
        }
        $comments = $post->comment; //fetch post comments
        $css = (object)array('openDropdown' => 'open', 'linkActive' => 'active', 'posts'=> 'posts');

        return view('portal.posts.show', compact('post', 'comments', 'css'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug (using post slug instead of id. the slug is unique)
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        //check if post has been fetched and if user is the author or admin
        if($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
        {
          return view('portal.posts.edit', compact('post'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($request->get('post_id'));
        if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
        {
          $title = $request->get('title');
          $slug = str_slug($title);
          $duplicate = Post::where('slug',$slug)->first();
          if($duplicate)
            {
              //checking duplicate post title
              if($duplicate->id != $request->get('post_id'))
              {
                //$post->slug = $slug; //if title exist
                $post->slug = $slug;
                $post->title = $title;
              }else {
              //  $post->slug = $slug;
              //  $post->title = $title;
              }
            }
            //echo "string";
          //  exit;
            $post->body = $this->summernoteImageProcessor($request);
            $post->featuredImage = $this->featuredImage($request);
            if($request->has('save'))
            {
              $post->active = 0;
              $message = 'Post Saved successfully';
              $landing = 'edit/'. $post->slug;
            }else {
              $post->active = 1;
              $message = 'Post updated successfully';
              $landing = $post->slug;
            }
            return redirect('Posts/'. $post->slug .'/edit');
        }else {
          return redirect('/')->withErrors('You dont have the right to edit this post.' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

      //  return $post;
        if($post &&($post->author_id == $request->user()->id || $request->user()->is_admin()))
        {
          $post->delete();
          $data['message'] = 'post deleted';
        }else {
          $data['errors'] = 'invalid operation. you cant delete post';
        }
        return redirect('/Posts')->with($data);
    }

    public function userPosts(Request $request)
    {
        //check if user is admin or author for them to Post
      //  if($request->user()->can_post()) //change to this after doing a fresh migration
    //  $posts = Post::where('author_id',$id)->where('active',1)->orderBy('created_at','desc')->paginate(5);
      $posts = Post::where('author_id', Auth::id())->where('active',1)->orderBy('created_at','desc')->get();
    //  return $posts;
      $css = (object)array('openDropdown' => 'open', 'linkActive' => 'active', 'posts'=> 'posts', 'published'=> 'Published Posts', 'publishedPosts' => 'btn btn-primary');
        return view('portal.posts.published', compact('css', 'posts'));
    }
    public function userDrafts(Request $request)
    {
        //check if user is admin or author for them to Post
      //  if($request->user()->can_post()) //change to this after doing a fresh migration
    //  $posts = Post::where('author_id',$id)->where('active',1)->orderBy('created_at','desc')->paginate(5);
      $posts = Post::where('author_id', Auth::id())->where('active',0)->orderBy('created_at','desc')->get();
    //  return $posts;
      $css = (object)array('openDropdown' => 'open', 'linkActive' => 'active', 'posts'=> 'posts', 'published'=> 'Published Posts', 'draftPosts' => 'btn btn-primary');
        return view('portal.posts.draft', compact('css', 'posts'));
    }
    public function uploadImage(Request $request)
    {
      $allowed = array('png', 'jpg', 'gif');
        $rules = [
            'file' => 'required|image|mimes:jpeg,jpg,png,gif'
        ];
        $data = Input::all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return '{"status":"Invalid File type"}';
        }
        if(Input::hasFile('file')){
            $extension = Input::file('file')->getClientOriginalExtension();
            if(!in_array(strtolower($extension), $allowed)){
                return '{"status":"Invalid File type"}';
            } else {
                $filename = uniqid() . '_attachment.' . $extension;
                if (Input::file('file')->move('source/', $filename)) {
                    echo url('source/' . $filename);
                    exit;
                }
            }
        } else {
            return '{"status":"Invalid File type"}';
        }
    }
}
