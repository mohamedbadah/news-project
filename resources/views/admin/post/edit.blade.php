@extends('admin.layout.master')
@section('content')
<div class="container">
     <div class="content-header">
      <div class="container-fluid">
           @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
           @endif

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">UpDate data</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="row">
          <div class="col-12">
<form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
                <input type="text" placeholder="title" value="{{$post->title}}" name="title" class=" form-control">
                @error('title')
                   <small class="text-danger">{{$message}}</small>
                @enderror
                </div>
                 <input type="text" placeholder="subtitle" value="{{$post->subtitle}}" name="subtitle" class=" form-control mb-3">
                 <textarea class="form-control mb-3" placeholder="contnent" name="content" >{{$post->title}}</textarea>
                  <input type="file" placeholder="image" name="post" name="image" class=" form-control mb-3">
                  <img src="{{asset('upload/'.$post->image)}}" width="100px" class="mb-3">
                   <select name="category_id" class="form-control mb-3">
                       <option disabled selected>
                           select category
                       </option>
                       @foreach ($categories as $category)
                           <option {{$category->id == $post->category_id ? 'selected':''}} value="{{$category->id}}">
                          {{$category->name}}
                        </option>
                       @endforeach
                   </select>
   <input class="btn btn-primary" type="submit" value="save">
</form>
          </div>
        </div>
</div>
@endsection
