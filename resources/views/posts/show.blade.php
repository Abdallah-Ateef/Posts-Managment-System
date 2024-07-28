@extends('posts.master')
@section('title','DIV.IO')
@section('content')
<div class="container">
    <div class="text-center p-3"><h1>{{$post->title}}</h1></div>

      <div class="card mb-3">
        <div class="card-header">
          {{$post->user->name}} - {{$post->created_at->format('d-m-Y')}}
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
            <img src="{{$post->image()}}" width="100%" height="400px">
          <p class="card-text">{{$post->description}}</p>
        </div>
      </div>
</div>
@endsection

