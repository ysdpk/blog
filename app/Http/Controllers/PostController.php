<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(10);
        return view('admin.post.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::all();
        $categories=Category::all();

        return view('admin.post.create')->with('tags',$tags)->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255|unique:posts,title',
            'category_id'=>'required',
            'tags'=>'required',
            'body'=>'required',
        ]);
        $post=new Post();
        $post->title=$request->title;
        $post->content=$request->body;
        $post->category_id=$request->category_id;
        $post->save();
        $post->tags()->sync($request->tags,false);
        \Session::flash('success','文章发布成功！');
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('admin.post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post=Post::find($id);
        return view('admin.post.edit')->with('post',$post);
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
        $this->validate($request,[
            'title'=>'required|max:255',
            'category_id'=>'required',
            'tags'=>'required',
            'body'=>'required',
        ]);
        $post=Post::find($id);
        $post->title=$request->title;
        $post->content=$request->body;
        $post->category_id=$request->category_id;
        $post->save();
        $post->tags()->sync($request->tags,true);
        \Session::flash('success','文章修改成功！');
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        \Session::flash('success','文章删除成功！');
        return redirect('post');
    }
}
