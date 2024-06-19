<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts=DB::select('select * from posts order by id desc');
        // $posts=Post::all();//asc
        // $posts=Post::orderBy('id','desc')->get();//多筆用get
        $posts=Post::orderBy('id','desc')->paginate(3);//分頁
        $data=[
            // 'name'=>'Tom' 
            'posts'=>$posts,
        ] ;
        return view ('posts.index',$data) ;
        //變數少可用
        // $name="Tom" ;
        // return view ('posts.index',compact('name')) ;
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create') ;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $att['title']=$request->input('title');
        $att['content']=$request->input('content');
        // $att['user_id']=auth()->user()->id();
        $att['user_id']=1;
        $att['views']=0;
        /*$att['created_at']=now();
        $att['updated_at']=now();
        DB::insert('insert into posts(title,content,user_id,views,created_at,updated_at) values (?,?,?,?,?,?)',
        [$att['title'],$att['content'],$att['user_id'],$att['views'],$att['created_at'],$att['updated_at']]);
        */
        
        Post::create($att);
        return redirect()->route('posts.index') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post=DB::select('select * from posts where id=?',[$id]) ;
        $data=[
            'post'=>$post,
        ];
        return view('posts.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $post=DB::select('select * from posts where id=?',[$id]) ;
        $data=[
            'post'=>$post,
        ];
        return view('posts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request,Post $post)
    {
        
        $att['title']=$request->input('title');
        $att['content']=$request->input('content');
        /* DB::update('update posts set title=?,content=? where id=?',
        [$att['title'],$att['content'],$id]);
        */
        // $post->update($att);
        $post->update($att) ;
        return redirect()->route('posts.index') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // DB::delete('delete from posts where id=?',[$id]);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
