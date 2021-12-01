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
           @section('script')
           @if (session('success'))
           <script>
           toastr.info("{{session('success')}}")
           </script>
           @endif
           @endsection

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Posts</h1>
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
                      <th>title</th>
                      <th>subtitle</th>
                      <th>slug</th>
                      <th>content</th>
                      <th>image</th>
                      <th>user_id</th>
                      <th>category_id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($posts as $post)
                       <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      <td>{{$post->subtitle}}</td>
                      <td>{{$post->slug}}</td>
                      <td><?php echo substr($post->content,0,30); ?> </td>
                      <td><img class="img-circle img-bordered-sm" src="{{asset('upload/'.$post->image)}}" width="100px" height="100px" alt="User Image"></td>
                      {{-- <img class="img-circle img-bordered-sm" src="{{asset('upload/'.$post->image)}}" alt="User Image"> --}}
                      <td>{{$post->user->name}}</td>
                      <td>{{$post->category->name}}</td>
                      <td><a href="{{route('post.edit',$post->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                      <form class="d-inline" action="{{route('post.destroy',$post->id)}}" method="POST">
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
          </div>
        </div>
        </div>
@endsection
