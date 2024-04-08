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
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control rounded-0" required="">
                                    <option value="" disabled {{ old('category') === null ? 'selected' : '' }}>Select</option>
                                    @foreach ($category as $item)
                                    <option value="{{ $item->id }}"  {{ ($item->id == $getSubCategory->category_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-0" id="name" name="name" value="{{ old('name', $getSubCategory->name) }}" placeholder="Enter name" required="">
                            </div>
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label>Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-0" id="slug" name="slug" value="{{ old('slug', $getSubCategory->slug) }}" placeholder="Enter slug Ex. URL" required="">
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                            </div>
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control rounded-0" required="">
                                    <option disabled>Select</option>
                                    <option value="0" {{ ($getSubCategory->status == '0') ? 'selected' : '' }}>Active</option>
                                    <option value="1" {{ ($getSubCategory->status == '1') ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label>Meta Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-0" id="meta_title" name="meta_title" value="{{ old('meta_title', $getSubCategory->meta_title) }}" placeholder="Enter meta title" required="">
                            </div>
                            <div class="col-lg-6 col-sm-12 form-group">
                                <label>Meta Keyword <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-0" id="meta_keyword" name="meta_keyword" value="{{ old('meta_keyword', $getSubCategory->meta_keyword) }}" placeholder="Enter meta keyword" required="">
                            </div>
                            <div class="col-lg-12 col-sm-12 form-group">
                                <label>Meta Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" rows="3" class="form-control rounded-0">{{ old('description', $getSubCategory->description) }}</textarea>
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
