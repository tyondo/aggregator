<?php

namespace Tyondo\Aggregator\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Tyondo\Aggregator\Models\Post;
use Tyondo\Aggregator\Models\Photo;
use Tyondo\Aggregator\Models\Category;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->can('access.all.posts')){

        }
        //$posts = Post::paginate(2);
        $posts = Post::all();
        //return $posts->photo->file;
        return view('aggregator::portal.admin.blog.posts.index', compact('posts'));
    }
    public function managePosts()
    {
        if(Auth::user()->can('manage.posts')){

        }
        $posts = Post::all();
        return view('aggregator::portal.admin.blog.posts.manage', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('create.posts')){

        }
        $categories = Category::pluck('name', 'id')->all();
        return view('aggregator::portal.admin.blog.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->can('store.posts')){

        }
        //add validation
        $user = Auth::user();
        if($request->file('featured_image_id')){
            $input = $request->all();
           // return 'there is a file';
            $file = $request->file('featured_image_id');
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=> $name]);
            $input['featured_image_id'] = $photo->id;
        }
        if ($file = $request->input('featured_image_id')){
            $input = $request->all();
            $photo = Photo::create(['file'=> $request->input('featured_image_id')]);
            $input['featured_image_id'] = $photo->id;
        }

        $postData = [
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category_id'),
            'tag_id' => $request->input('tag_id'),
            'featured_image_id' => $input['featured_image_id'],
            'title' => $request->input('title'),
            'slug' => str_slug($request->input('title')) .'-'.time(),
            'summary' => $request->input('summary'),
            'body' => $request->input('body'),
            'post_status' => $request->input('post_status'),
        ];
       $post = Post::create($postData);
        $post->syncTags($request->get('tags', []));

      //  return $postData;


       // $user->posts()->create($input);
        Session::flash('message', 'Post Created');
        return redirect(route('admin.posts.manage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->can('access.single.posts')){

        }
        $post = Post::findOrFail($id);
        //return $post;
        return view('aggregator::portal.admin.blog.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('edit.posts')){

        }
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('aggregator::portal.admin.blog.posts.edit', compact('categories', 'post'));
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
        if(Auth::user()->can('update.posts')){

        }

        $input = $request->all();
        $post = Post::find($id);
        $post->category_id = $input['category_id'];
        $post->post_status = $input['post_status'];
            if($post->title != $input['title']){
                $post->title = $input['title'];
                $post->slug = str_slug($request->input('title')) .'-'.time();
            }
        $post->body = $input['body'];
        $post->save();
        $post->syncTags($request->get('tags', []));

      return redirect(route('admin.posts.manage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->can('destroy.posts')){

        }
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        unlink(public_path($post->photo->file));
        $post->delete();
        Session::flash('message', 'The post has been deleted :-(');
        return redirect(route('admin.posts.manage'));
    }
}
