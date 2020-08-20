@extends('layout')
    @section('content')
    <h1>ayoub welcome create</h1>


    
<form  method="POST" action="{{route('posts.store')}}">
    @csrf
    @include('posts.form')
      <button class="btn btn-block btn-info" type="submit">Add post</button>
  </form>

    @endsection