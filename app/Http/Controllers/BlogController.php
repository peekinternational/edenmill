<?php

namespace Edenmill\Http\Controllers;

use Carbon\Carbon;
use Edenmill\Blog;
use Illuminate\Http\Request;

use Edenmill\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display all the listing of the blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'All Blog Posts';
        $posts = Blog::orderBy('publish_at','desc')->paginate(20);
        return view('dashboard.blog.index',compact('posts','title'));
    }
    /**
     * Display a listing of the published blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function published()
    {
        //\DB::enableQueryLog();
        $title = 'Published Blog Posts';
        $posts = Blog::orderBy('publish_at','desc')->published()->paginate(20);
        return view('dashboard.blog.index',compact('posts','title'));
        //dd(\DB::getQueryLog());
    }


    /**
     * Display a listing of the unPublished blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function unPublished()
    {
        $title = 'UnPublished Blog Posts';
        $posts = Blog::orderBy('publish_at','desc')->unPublished()->paginate(20);
        return view('dashboard.blog.index',compact('posts','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.create');
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
            'post' => 'required'
            ]
        );
       // return $request->all();

        if($request->has('publish_at')){
          $request->merge(['publish_at'=>Carbon::parse($request->input('publish_at'))]);
        }
        $request->merge(['user_id'=>Auth::user()->id]);

        $post = Blog::create($request->all());
        if($post->id){
            session()->flash('__response', ['notify'=>'Blog Post posted successfully.','type'=>'success']);
            return redirect()->action('BlogController@index');
        }else{
            session()->flash('__response', ['notify'=>'Blog Post could not be posted.','type'=>'error']);
        }
        return back()->withInput();
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
     * Display the Display a single Blog Post it client side
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost($id)
    {
        $post = Blog::findOrFail($id);
        return view('blog.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Blog::findOrFail($id);
        return view('dashboard.blog.edit',compact('post'));
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
        if($request->has('publish_at')){
            $request->merge(['publish_at'=>Carbon::parse($request->input('publish_at'))]);
        }
        $post = Blog::findOrFail($id);
        $post->fill($request->all());
        if($post->update()){
            session()->flash('__response', ['notify'=>'Blog Post updated successfully.','type'=>'success']);
        }else{
            session()->flash('__response', ['notify'=>'Blog Post could not be updated.','type'=>'error']);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Blog::findOrFail($id);
        return $post;
    }

    public function getPosts(){
        $posts =  Blog::orderBy('publish_at','desc')->published()->paginate(10);
        return view('blog.index',compact('posts'));
    }
}
