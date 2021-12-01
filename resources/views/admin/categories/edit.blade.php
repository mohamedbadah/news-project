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
<form action="{{route('category.update',$categories->id)}}" method="POST">
    @csrf
    @method('put')
   <input type="text" name="name" placeholder="name" class="form-control mb-3" value="{{$categories->name}}">
   <input class="btn btn-primary" type="submit" value="save">
</form>
          </div>
        </div>
</div>
@endsection
