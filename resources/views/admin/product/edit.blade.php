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

                    @include('admin.layouts._message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-edit pr-2"></i> {{$title}}</h3>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control rounded-0" id="title" name="title" value="{{ old('title', $product->title) }}" placeholder="Enter title" required="">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>SKU <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control rounded-0" id="sku" name="sku" value="{{ $product->sku }}" placeholder="Enter sku" required="">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Categoy <span class="text-danger">*</span></label>
                                        <select class="form-control rounded-0" name="category_id" id="category_id" required>
                                            <option selected="">Select</option>
                                            @foreach ($category as $item)
                                            <option {{ ($product->category_id==$item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Sub Category <span class="text-danger">*</span></label>
                                        <select class="form-control rounded-0" name="sub_category_id" id="sub_category_id" required>
                                            <option  selected="">Select</option>
                                            @foreach ($sub_category as $item)
                                            <option {{ ($product->sub_category_id==$item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Brand <span class="text-danger">*</span></label>
                                        <select class="form-control rounded-0" name="brand_id" id="brand_id" required>
                                            <option  selected="">Select</option>
                                            @foreach ($brand as $item)
                                            <option {{ ($product->brand_id==$item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Color <span class="text-danger">*</span></label>
                                        <div>
                                            @foreach ($color as $item)
                                                @php
                                                    $checked = '';
                                                @endphp
                                                @foreach ($product->getColor as $pcolor)
                                                    @if ($pcolor->color_id == $item->id)
                                                        @php
                                                            $checked = 'checked';
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            <label for="color" class="pr-3"><input type="checkbox" {{$checked}} name="color_id[]" id="color_id[]" value="{{ $item->id }}"> {{ $item->name }} </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>New Price (TZS) <span class="text-danger">*</span></label>
                                        <input type="number" min="0" class="form-control rounded-0" id="price" name="price" value="{{ $product->price }}" placeholder="Enter price" required="">
                                    </div>
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <label>Old Price (TZS) <span class="text-danger">*</span></label>
                                        <input type="number" min="0" class="form-control rounded-0" id="old_price" name="old_price" value="{{ $product->old_price }}" placeholder="Enter old price" required="">
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
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
                                                    @php $iSize = 1; @endphp
                                                    @foreach ($product->getSize as $item)
                                                    <tr id="deleteSize{{$iSize}}">
                                                        <td><input type="text" name="size[{{ $iSize }}][name]" value="{{ $item->name }}" id="size_name" placeholder="Enter name" class="form-control"></td>
                                                        <td><input type="number" min="0" name="size[{{ $iSize }}][price]" value="{{ $item->price }}" id="size_price" placeholder="Enter price" class="form-control"></td>
                                                        <td>
                                                            <div class="btn-group">
                                                            <button type="button" id="{{ $iSize }}" title="Delete" class="btn btn-sm btn-danger deleteSize"><i class="fas fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php $iSize++; @endphp
                                                    @endforeach
                                                    <tr>
                                                        <td><input type="text" name="size[100][name]" id="size_name" placeholder="Enter name" class="form-control"></td>
                                                        <td><input type="number" min="0" name="size[100][price]" id="size_price" placeholder="Enter price" class="form-control"></td>
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
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control rounded-0" id="image[]" name="image[]" multiple accept="" style="padding: 5px;" value="" placeholder="Upload file" >
                                    </div>
                                </div>

                                @if (!empty($product->getImage->count()))
                                <div class="row" id="sortable">
                                    @foreach ($product->getImage as $image)
                                        @if (!empty($image->listImage()))
                                            <div class="col-md-1 col-sm-12 form-group text-center sortable-image" id="{{$image->id}}">
                                                <img src="{{$image->listImage()}}" style="width:100%; height:80px;" alt="">
                                                <a onclick="return confirm('Are you sure you want to delete this image?')?window.location.href='{{url('admin/product/delete_image/'.Crypt::encrypt($image->id))}}':false;" class="btn btn-sm btn-danger text-center mt-1"><i class="fas fa-trash"></i></a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                                <hr>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Short Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" rows="3" id="short_description" name="short_description" >{{ $product->short_description }}</textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="description" id="description">{{ $product->description }}</textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Additional Info <span class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="additional_info" id="additional_info">{{ $product->additional_info }}</textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Shipping Returns <span class="text-danger">*</span></label>
                                        <textarea class="form-control summernote" name="shipping_returns" id="shipping_returns">{{ $product->shipping_returns }}</textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control rounded-0" required="">
                                            <option value="" disabled {{ old('status') === null ? 'selected' : '' }}>Select</option>
                                            <option value="0" {{ ($product->status == 0) ? 'selected' : '' }}>Active</option>
                                            <option value="1" {{ ($product->status == 1) ? 'selected' : '' }}>Inactive</option>
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
        </div>
    </section>
</div>



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

        // Sorting Images
        $('#sortable').sortable({
            update : function(event,ui){
                var photo_id = new Array();
                $('.sortable_image').each(function(){
                    var id = $(this).attr('id');
                    photo_id.push(id);
                })
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/product/image_sortable') }}",
                    data: {
                        "photo_id" : photo_id,
                        "_token" : "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function (data) {
                    },
                    error:function(data){
                    }
                });
            }
        })

        // Add table fields
        var i = 101;
        $('body').delegate('.addSize', 'click', function(e){
            var html = '<tr id="deleteSize'+i+'">'+
                            '<td><input type="text" name="size['+i+'][name]" placeholder="Enter name" class="form-control"></td>'+
                            '<td><input type="number" min="0" name="size['+i+'][price]" placeholder="Enter price" class="form-control"></td>'+
                            '<td>'+
                                '<div class="btn-group">'+
                                '<button type="button" title="Delete" id="'+i+'"  class="btn btn-sm btn-danger deleteSize"><i class="fas fa-trash"></i></button>'+
                                '</div>'+
                            '</td>'+
                        '</tr>';
            i++;
            $('#appendSize').append(html);
        })


        // Deleting table Fields
        $('body').delegate('.deleteSize','click', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            $('#deleteSize'+id).remove();
        });

        // Changing Category
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

    });
</script>

@endsection
