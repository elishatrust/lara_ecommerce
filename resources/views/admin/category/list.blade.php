@extends('admin.layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12">
                    @include('admin.layouts._message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-list pr-2"></i> {{$title}}</h3>
                            <a href="{{ url('admin/category/add')}}"  class="float-right btn btn-sm btn-primary"
                                style="margin-right:2%;">Add New</a>
                        </div>
                        <div class="card-body p-2 table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Meta Title</th>
                                    <th>Meta Keyword</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=1; foreach ($category as $item){ ?>
                                    <tr>
                                    <td>{{ $n }}</td>
                                    <td>{{ $item->name}}</td>
                                    <td><i>{{ $item->slug }}</i></td>
                                    <td>{{ $item->meta_title}}</td>
                                    <td>{{ $item->meta_keyword}}</td>
                                    <td>{{ $item->description}}</td>
                                    <td>
                                        @if ($item->status==0)
                                            <span class="badge bg-primary">Active</span>
                                        @endif
                                        @if ($item->status==1)
                                            <span class="badge bg-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y | h:m A ', strtotime($item->created_at))}}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="{{url('admin/category/edit/'.Crypt::encrypt($item->id))}}" class="btn btn-sm btn-info"><i class="fas fa-pen"></i></a>
                                        <a onclick="return confirm('Do You Want to Delete This Record ?')?window.location.href='{{url('admin/category/delete/'.Crypt::encrypt($item->id))}}':false;" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                    </tr>
                                    <?php $n++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->




@endsection
