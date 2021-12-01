@extends('admin.layout.master')
@section('content')
<div class="container">
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Categories</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="row">
          <div class="col-12">
              <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                <input type="text" placeholder="title" name="title" class=" form-control">
                @error('title')
                   <small class="text-danger">{{$message}}</small>
                @enderror
                </div>
                 <input type="text" placeholder="subtitle" name="subtitle" class=" form-control mb-3">
                 <textarea class="form-control mb-3" placeholder="contnent" name="content" ></textarea>
                  <input type="file" placeholder="image" name="image" class=" form-control mb-3">
                   <select name="category_id" class="form-control mb-3">
                       <option disabled selected>
                           select category
                       </option>
                       @foreach ($categories as $category)
                           <option value="{{$category->id}}">
                          {{$category->name}}
                        </option>
                       @endforeach
                   </select>
                <button class="btn btn-success">save</button>
              </form>
          </div>
        </div>
        </div>
@endsection
