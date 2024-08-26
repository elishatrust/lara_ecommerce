@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="{{ url('public/assets/plugins/summernote/summernote-bs4.min.css') }}">

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
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-0" id="title" name="titlr" value="{{ old('title', $blog->title) }}" placeholder="Enter title" required="">
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                            <div class="col-md-6 col-sm-12 form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                {{-- <select class="form-control rounded-0" name="category_id" id="category_id" required>
                                    <option selected="">Select</option>
                                    <?php dd($category) ?>
                                    @foreach ($category as $item)
                                    <option {{ ($category->category_id == $item->category_id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> --}}
                            </div>
                            <div class="col-md-6 col-sm-12 form-group">
                                <label>Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control rounded-0" id="image" name="image" required="" style="padding: 5px;" value="" placeholder="Upload file" >
                            </div>
                            <div class="col-md-12 col-sm-12 form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea class="form-control summernote" name="description" id="description" required="">{{ $blog->description }}</textarea>
                            </div>

                            <div class="col-md-6 col-sm-12 form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control rounded-0" required="">
                                    <option disabled>Select</option>
                                    <option value="0" {{ ($blog->status == '0') ? 'selected' : '' }}>Active</option>
                                    <option value="1" {{ ($blog->status == '1') ? 'selected' : '' }}>Inactive</option>
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

<aside class="control-sidebar control-sidebar-dark"></aside>


<script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ url('public/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>

$(document).ready(function () {
    // Texteditor
    $('textarea.summernote').summernote({
        placeholder: 'Enter description...',
        tabsize: 2,
        height: 100,
        minHeight: null,
        maxHeight: null,
        focus: true
    });
});
</script>

@endsection
