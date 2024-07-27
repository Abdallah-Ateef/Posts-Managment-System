@extends('posts.master')
@section('title','posts')
@section('content')
<div class="container">
  <a href="{{route('posts.create')}}"><button type="button" class="btn btn-primary m-3">Add New Post</button>
  </a>
    <h1 class="text-center p-3">View All Posts To Admin</h1>
    @if(session()->get('success'))
    <div class="alert alert-danger">{{session()->get('success')}}</div>
    @endif
    <div class="row">
    <div class="col-12">
    <table class="table table-borderd">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>User</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->user->name}}</td>
            <td><a href="{{route('posts.edit',$post->id)}}"><button type="button" class="btn btn-info">Edit</button></a> </td>
            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
              @csrf
              @method('delete')
            <td><button type="input" class="btn btn-danger">Delete</button></td>
          </form>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>

    {{$posts->links()}}

</div>
@endsection
