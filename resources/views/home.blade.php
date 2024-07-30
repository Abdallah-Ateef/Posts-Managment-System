@extends('posts.master')
@section('title','DIV.IO')
@section('content')
    <div class="container">
        <div class="text-center p-3"><h1>Show All Posts</h1></div>
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-header">
                    {{$post->user->name}} - {{$post->created_at->format('d-m-Y')}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <img src="{{$post->image()}}" width="100%" height="400px">
                    <p class="card-text">{{\Str::limit($post->description,50)}}</p>
                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Show More Details</a>
                </div>

            </div>
        @endforeach
        {{$posts->links()}}
    </div>
@endsection

