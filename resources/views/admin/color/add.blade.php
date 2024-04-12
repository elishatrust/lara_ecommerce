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
                            <h3 class="card-title"><i class="far fa-plus-square pr-2"></i> {{$title}}</h3>
                        </div>
                        <form action="" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control rounded-0" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name" required="">
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Code <span class="text-danger">*</span></label>
                                        <input type="color" class="form-control rounded-0" id="code" name="code" value="{{ old('code') }}" placeholder="Enter code Ex. #000" required="">
                                        <span class="text-danger">{{ $errors->first('code') }}</span>
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control rounded-0" required="">
                                            <option value="" disabled {{ old('status') === null ? 'selected' : '' }}>Select</option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Active</option>
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

@endsection
