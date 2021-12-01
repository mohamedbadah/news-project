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
              <form action="{{route('category.store')}}" method="POST">
                @csrf
                 @error('name')
                 <div class="alert alert-danger text-center">{{$message}}</div>
                @enderror
                <input type="text" placeholder="Name Category" name="name" class=" form-control mb-3">
                <button class="btn btn-success">save</button>
              </form>
          </div>
        </div>
        </div>
@endsection
