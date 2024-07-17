@extends('posts.master')
@section('title','Create')
@section('content')
<div class="container">
    <div class="text-center p-3"><h1>Add New Post</h1></div>
    <form action="{{route('posts.store')}}" class="form border p-3" method="POST">
       @csrf
       @if (session()->get('success'))
          <div class="alert alert-success ">{{session()->get('success')}}</div> 
       @endif
            <div class="mb-3">
              <label for="exampleInputpost" class="form-label">Post Title</label>
              <input type="text" class="form-control" id="exampleInputpost" name="title" value="{{old('title')}}">
              @error('title')
              <div class="alert alert-danger m-2">{{ $message }}</div>
          @enderror
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="description" value="{{old('description')}}"></textarea>
                <label for="floatingTextarea2" name="description">Description</label>
                @error('description')
                <div class="alert alert-danger m-2">{{ $message }}</div>
            @enderror
              </div>
              <div class="mb-3">
                <label for="writer">Writer</label>
                <select id="writer" class="form-control" name="user_id">
                    <option value="2">Mostafa</option>
                    <option value="3">Ali</option>
                    <option value="1">Abdallah</option>
                </select>
                @error('user_id')
                <div class="alert alert-danger m-2">{{ $message }}</div>
            @enderror
              </div>
              <div class="mb-3">
                <input type="submit" class="form-control bg-success" value="Save">
              </div>
           
        
    </form>
</div>
@endsection
    