@extends('layout')
    @section('content')
    <h1>ayoub welcome edit</h1>


    
<form  method="POST" action="{{route('posts.update',['post'=> $post->id])}}">
    @csrf
    @method('PUT')
        @include('posts.form')
      <button  class="btn btn-block btn-warning" type="submit">update post</button>
  </form>

    @endsection