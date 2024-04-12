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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit pr-2"></i> {{$title}}</h3>
                </div>
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-0" id="name" name="name" value="{{ old('name', $getAdmin->name) }}" placeholder="Enter full name" required="">
                            </div>
                            <div class="col-md-6 col-sm-12 form-group">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="number" class="form-control rounded-0" id="phone" name="phone" value="{{ old('phone', $getAdmin->phone) }}" placeholder="Enter phone number" required="">
                            </div>
                            <div class="col-md-6 col-sm-12 form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control rounded-0" id="email" name="email" value="{{ old('email', $getAdmin->email) }}" placeholder="Enter email" required="">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col-md-6 col-sm-12 form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-0" id="password" name="password" placeholder="Password">
                                <p class="text-danger">Do you want to change password?</p>
                            </div>
                            <div class="col-md-6 col-sm-12 form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control rounded-0" required="">
                                    <option disabled>Select</option>
                                    <option value="0" {{ ($getAdmin->status == '0') ? 'selected' : '' }}>Active</option>
                                    <option value="1" {{ ($getAdmin->status == '1') ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary rounded-0">Update</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>


  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

@endsection
