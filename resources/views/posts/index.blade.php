@extends('layout')
    @section('content')
    <h1>ayoub welcome index</h1>
    <ul class="list-group">
        @forelse ($posts as $post)
    <li class="list-group-item"> 
        <h1><a href="{{route('posts.show',['post'=>$post->id])}}">{{$post->title}}</a></h1>

    <p>{{$post->content}}</p>
    <p>{{$post->created_at}}</p>
    <a class="btn btn-info" href="{{ route('posts.edit', ['post'=>$post->id]) }}">Edit</a>
    <form style="display: inline" method="POST" action="{{route('posts.destroy',['post'=> $post->id])}}">
        @csrf
        @method('DELETE')
           
          <button class="btn btn-danger" type="submit">delete</button>
      </form>
    
    <p>
        Status:
        @if ($post->active)
           Enabled
        @else
            Disabled
        @endif
    </p>
    </li>
    @empty
        <p>Not posts</p>
    
    @endforelse
    </ul>

    
    @endsection