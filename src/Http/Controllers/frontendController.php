<?php

namespace Tyondo\Aggregator\Http\Controllers;
use Tyondo\Aggregator\Models\Post;
use Tyondo\Aggregator\Models\Category;

class frontendController extends Controller
{
    /**
     * Display a listing of the resource.
     * Write a function that checks if table has data, if not, fail silently and inform admin
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status',2)->orderBy('created_at','desc')->get();
        $categories = Category::all();
        //return $posts;
      return view('aggregator::frontend.aggregator.landing-home.index', compact('posts','categories')); //index
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $post = Post::where('slug', $slug)->first();
            $prevPost =   Post::where('id', (($post->id) - 1))->first();
            $nextPost =   Post::where('id', (($post->id) + 1))->first();
            $posts = Post::where('status',2)->orderBy('created_at','desc')->take(4)->get();
      if(!$post)
      {
        return abort(404);
      }
      return view('aggregator::frontend.aggregator.post.index',compact('post','posts','prevPost','nextPost'));
    }
    public function showBlog()
    {
    //  $posts = Post::paginate(2);
      //  $posts = Post::where('status', 2)->orderBy('created_at', 'desc')->get();
        $posts = Post::where('status', 2)->orderBy('created_at', 'desc')->simplePaginate(6);
        return view('aggregator::frontend.v2.includes.blog', compact('posts'));
    }
    public function showUserProfile()
    {

        return view('aggregator::portal.user.profile');
    }
}
