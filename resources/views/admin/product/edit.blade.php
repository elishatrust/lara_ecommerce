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
                                    <div class="col-lg-6 col-sm-12 form-group">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control rounded-0" id="title" name="title" value="{{ old('title', $product->title) }}" placeholder="Enter title" required="">
                                    </div>
                                    <div class="col-lg-6 col-sm-12 form-group">
                                        <label>SKU <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control rounded-0" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" placeholder="Enter sku" required="">
                                    </div>
                                    <div class="col-lg-6 col-sm-12 form-group">
                                        <label>Categoy <span class="text-danger">*</span></label>
                                        <select class="form-control rounded-0" name="category_id" id="category_id" required>
                                            <option value="" disabled {{ old('category') === null ? 'selected' : '' }}>Select</option>
                                            @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 form-group">
                                        <label>Sub Category <span class="text-danger">*</span></label>
                                        <select class="form-control rounded-0" name="sub_category_id" id="sub_category_id" required>
                                            <option value="" disabled {{ old('sub_category') === null ? 'selected' : '' }}>Select</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 form-group">
                                        <label>Brand <span class="text-danger">*</span></label>
                                        <select class="form-control rounded-0" name="brand_id" id="brand_id" required>
                                            <option value="" disabled {{ old('brand') === null ? 'selected' : '' }}>Select</option>
                                            @foreach ($brand as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 form-group">
                                        <label>Color <span class="text-danger">*</span></label>
                                        <div>
                                            @foreach ($color as $item)
                                            <label for="color" class="pr-3"><input type="checkbox" name="color_id[]" id="color_id[]" value="{{ $item->name }}"> {{ $item->name }} </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 form-group">
                                        <label>New Price (TZS) <span class="text-danger">*</span></label>
                                        <input type="number" min="0" class="form-control rounded-0" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="Enter price" required="">
                                    </div>
                                    <div class="col-lg-6 col-sm-12 form-group">
                                        <label>Old Price (TZS) <span class="text-danger">*</span></label>
                                        <input type="number" min="0" class="form-control rounded-0" id="old_price" name="old_price" value="{{ old('old_price', $product->old_price) }}" placeholder="Enter old price" required="">
                                    </div>
                                    <div class="col-lg-12 col-sm-12 form-group">
                                        <label>Size <span class="text-danger">*</span></label>
                                        <div class="p-2 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Price (TZS)</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="appendSize">
                                                    <tr>
                                                        <td><input type="text" name="name" placeholder="Enter name" class="form-control"></td>
                                                        <td><input type="number" min="0" name="price" placeholder="Enter price" class="form-control"></td>
                                                        <td>
                                                            <div class="btn-group">
                                                            <button type="button" title="Add" class="btn btn-sm btn-info addSize"><i class="far fa-plus-square"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 form-group">
                                        <label>Short Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" rows="3" id="short_description" name="short_description" value="{{ old('short_description', $product->price) }}" placeholder="Enter short description" required="">{{ old('additional_info') }}</textarea>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="description" id="description"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 form-group">
                                        <label>Additional Info <span class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="additional_info" id="additional_info"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 form-group">
                                        <label>Shipping Returns <span class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="shipping_returns" id="shipping_returns"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 form-group">
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


<script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>

$(document).ready(function () {


    var i = 0;
    $('body').delegate('.addSize', 'click', function(e){
        var html = '<tr id="deleteSize'+i+'">'+
                        '<td><input type="text" name="name" placeholder="Enter name" class="form-control"></td>'+
                        '<td><input type="number" min="0" name="price" placeholder="Enter price" class="form-control"></td>'+
                        '<td>'+
                            '<div class="btn-group">'+
                            '<button type="button" title="Delete" id="'+i+'"  class="btn btn-sm btn-danger deleteSize"><i class="fas fa-trash"></i></button>'+
                            '</div>'+
                        '</td>'+
                    '</tr>';
        i++;
        $('#appendSize').append(html);
    })


    $('body').delegate('.deleteSize','click', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $('#deleteSize'+id).remove();
    });


    $('body').delegate('#category_id','change', function(e){
        e.preventDefault();
        var id = $(this).val();

        $.ajax({
            type: "POST",
            url: "{{ url('admin/get_subCategory') }}",
            data: {
                "id" : id,
                "_token" : "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                $('#sub_category_id').html(data.html);
            },
            error:function(data){
            }
        });
    });

    $('textarea.summernote').summernote({
        placeholder: 'Add description',
        tabsize: 2,
        height: 100,
        minHeight: null,
        maxHeight: null,
        focus: true
    });

});

</script>

@endsection
