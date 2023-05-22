@extends('admin.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    @include('admin.layouts._message')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12 col-12">            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Lists
                </h3>
                <a href="#"  class="float-right btn btn-sm btn-primary" 
                    data-toggle="modal" data-target="#addNewAdminModal"
                    style="margin-right:2%;">Add New Admin</a>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table" id="example2">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>E-Mail</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $item)
                    <tr>
                      <td>{{ $item->id}}</td>
                      <td>{{ $item->name}}</td>
                      <td>{{ $item->email}}</td>
                      <td>
                        @if ($item->status==0)
                            <span class="badge bg-primary">Active</span>
                        @endif
                        @if ($item->status==1)
                            <span class="badge bg-warning">Inactive</span>
                        @endif
                      </td>
                      <td>
                        <div class="btn-group">
                          <a href="{{url('admin/admin/edit_admin/'.$item->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                          <a onclick="return confirm('Do You Want to Delete This Record ?')?window.location.href='{{url('admin/admin/delete_admin/'.$item->id)}}':false;" href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
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
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  




  <!-- Add New AdminModal -->
  <div class="modal fade" id="addNewAdminModal" tabindex="-1" aria-labelledby="addNewAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="addNewAdminModalLabel">New Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="quickForm" method="POST" action="{{url('admin/admin/add')}}">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                <label for="">E-Mail</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="save_btn()" class="btn btn-primary">Save </button>
                </div>
           
            </form>            
        </div>
      </div>
    </div>
  </div>


  {{-- @section('script')
      
  <script>
    function save_btn()
    {
      var name = $('.name').val();
      var email = $('.email').val();
      var password = $('.password').val();
      var status = $('.status').val();

      vard formData = new formData();
      formData.append('name: ', name);
      formData.append('email: ', email);
      formData.append('password: ', password);
      formData.append('status: ', status);

      alert('It work');
      //console.log(formData);
    }

  </script> --}}


@endsection
