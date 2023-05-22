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

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12 col-6">            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin Lists
                </h3>
                <a href="{{ url('admin/admin/add')}} "  class="float-right btn btn-sm btn-primary" 
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
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>Clean database</td>
                      <td><span class="badge bg-warning">70%</span></td>
                      <td><span class="badge bg-primary">30%</span></td>
                    </tr>
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
                <section name="status">
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
           
            </form>            
        </div>
      </div>
    </div>
  </div>


@endsection
