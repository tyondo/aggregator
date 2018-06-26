<?php

namespace Tyondo\Aggregator\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tyondo\Aggregator\Models\Category;
use Tyondo\Aggregator\Models\Tag;
use Illuminate\Support\Facades\Auth;

class AdminPostMetadataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if(Auth::user()->can('access.categories')){

        }*/
        $categories = Category::all();
        $tags = Tag::all();
      return view('aggregator::portal.admin.blog.categories.index', compact('categories','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('create.categories')){

        }
        return view('aggregator::portal.admin.blog.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->can('store.categories')){

        }
        if ($request->input('term_type') == 'category'){
                $metaData = [
                    'title' => $request->input('title'),
                    'category' => str_slug($request->input('title')),
                    'meta_description' => $request->input('description')
                ];
                //return $metaData;
                Category::create($metaData);
                Session::flash('message', 'New Category created');
                return redirect()->route('admin.categories.index');
        }
        if ($request->input('term_type') == 'tag'){
            $metaData = [
                'title' => $request->input('title'),
                'tag' => str_slug($request->input('title')),
                'meta_description' => $request->input('description')
            ];
            Tag::create($metaData);
            Session::flash('message','New Tag Created');
            return redirect()->route('admin.categories.index');

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('edit.categories')){

        }
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('aggregator::portal.admin.blog.categories.edit', compact('category', 'categories'));
        //return view('admin.categories.edit', compact('category', 'categories'));
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
        if(Auth::user()->can('update.categories')){

        }
        Category::findOrFail($id)->update($request->all());
        Session::flash('message', 'Category Updated');
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->can('destroy.categories')){

        }
        Category::findOrFail($id)->delete();
        Session::flash('message', 'Category deleted');
        return redirect('admin/categories');
    }
}
