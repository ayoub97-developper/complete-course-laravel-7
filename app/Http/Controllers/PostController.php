<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('posts.index',[
            'posts'=> Post::all()
            ]);
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
        return view('posts.show',[
            'post'=> Post::find($id)
            ]);
    }


    public function create(){
            return view ('posts.create');

    }

   
   /* public function store(Request $request){
            //dd($request->all());
           $validateddata= $request->validate([
                'title'=>'required|min:4|min:100',
                'content'=>'required',
                
            ]);
                $post=new Post;

            $post->title=$request->input("title");
            $post->content=$request->input("content");
            $post->slug=str::slug($post->title,'-');
            $post->active=false;
            $post->save();

            $request->session()->flash('status','was created');
            //dd('ok');
        //   return redirect('/posts');
      //  return redirect()->route('posts.show',[$post->id]);

      return redirect()->route('posts.index');
    }*/

    //request personnaliser
    public function store(StorePost $request){
        //dd($request->all());
        $data=$request->only(['title','content']);
        $data['slug']=str::slug($data['title'],'-');
        $data['active']=false;
        $post=Post::create($data) ;  
        $request->session()->flash('status','was created');
        //dd('ok');
    //   return redirect('/posts');
  //  return redirect()->route('posts.show',[$post->id]);

  return redirect()->route('posts.index');
}


    public function edit($id){
            $post=Post::findOrFail($id);
            return view('posts.edit',[
                'post' => $post
                ]);
    }

    public function update(StorePost $request, $id){
        $post=Post::findOrFail($id);
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->slug=str::slug($request->input('title'),'-');
        
        $post->save();
        $request->session()->flash('status','updated ');
        return redirect()->route('posts.index');
    }

    public function destroy(Request $request, $id){
       // $post=Post::findOrFail( $id);

       // $post->delete();

       Post::destroy($id);

        $request->session()->flash('status','updated ');
        return redirect()->route('posts.index');


    }
}
