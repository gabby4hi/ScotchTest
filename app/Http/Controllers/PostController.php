<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;
use App\Tag;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/post/index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();

        if($categories->count() == 0){

            Session::flash('info', 'You must have some categories before creating any post');
            return redirect()->back();
        }
    
        return view('admin.post.create')->with('category', $categories)->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        
        $this->validate($request, [
            'title' => 'required',
            'featured'=>'required|image',
            'content'=>'required',
            'category'=>'required',
            'tags'=>'required']);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('upload/post', $featured_new_name);

        $post = Post::create([

            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category,
            'featured'=>'upload/post/'.$featured_new_name,
            'slug'=>str_slug($request->title)
        ]);


            $post->tags()->attach($request->tags);

        Session::flash('success', 'You have successfully entered a Post');

        return redirect()->back();

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
        //
        return view('admin.post.edit')
                ->with('post', Post::find($id))
                ->with('category', Category::all())
                ->with('tags', Tag::all());
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
        $post = Post::find($id);

        $this->validate($request, [
            'title'=> 'required',
            'category'=>'required',
            'content'=>'required',
            'tags' =>'required']);


        if ($request->hasFile('featured')) {
            # code...
            $featured = $required->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('upload/post', $featured_new_name);
            $post->featured = 'upload/post/'.$featured_new_name;

            }

            $post->title = $request->title;
            $post->category_id = $request->category;
            $post->content = $request->content;

            $post->tags()->sync($request->tags);

            $post->save();

            Session::flash('success', 'The post as been sucessfully edited');

            return redirect()->route('posts');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'This is post as been successfully Trashed');

        return redirect()->back();
    }

    public function trash(){
        $post = Post::onlyTrashed()
                ->get();



        return view('admin/post/trash')->with('posts', $post);
        //dd($post);
    }

    public function kill($id){
        $post = Post::withTrashed()
                ->where('id', $id)
                ->first();

        $post->forceDelete();

        Session::flash('success', 'The post as been permanently deleted..');

        return redirect()->back();
    }

    public function restore($id){
        $post = Post::withTrashed()
                ->where('id', $id)
                ->first();
        $post->restore();

        return redirect()->route('posts');
    }
}
