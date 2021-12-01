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
            <h1 class="m-0">All Categories</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>created_At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $category)
                       <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->name}}</td>
                      <td>{{$category->created_at}}</td>
                      <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                      <form class="d-inline" action="{{route('category.destroy',$category->id)}}" method="POST">
                       @csrf
                       @method('delete')
                       <button onclick="return confirm('are yous sure delete')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                      </form>
                    </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{$categories->links()}}
          </div>
        </div>
        </div>
@endsection
