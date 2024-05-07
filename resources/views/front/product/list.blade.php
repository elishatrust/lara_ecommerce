@extends('front.layouts.app')
<style>
    .active-color{
        border: 3px solid #000!important;
        padding: 1px;
    }
</style>
@section('content')


<main class="main">
    <div class="page-header text-center" style="background-image: url('{{ asset('public/assets-front/images/page-header-bg.jpg') }}')">
        <div class="container">
            @if (!empty($getSubCategory))
                <h1 class="page-title">{{ $getSubCategory->name }}</h1>
            @else
                <h1 class="page-title">{{ $getCategory->name }}</h1>
            @endif
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript;">Shop</a></li>

                @if (!empty($getSubCategory))
                <li class="breadcrumb-item" aria-current="page"><a href="{{ url($getCategory->slug) }}">{{ $getCategory->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $getSubCategory->name }}</li>
                @else
                <li class="breadcrumb-item active" aria-current="page">{{ $getCategory->name }}</li>
                @endif

            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing <span>9 of 56</span> Products
                            </div>
                        </div>

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control changeSortBy">
                                        <option>Select</option>
                                        <option value="popularity">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="getProductAjax">
                        {{-- <div class="products mb-3">
                            <div class="row justify-content-center">
                                @foreach ($showProduct as $product)
                                @php
                                    $productImage = $product->productImage($product->id)
                                @endphp
                                <div class="col-12 col-md-4 col-lg-4">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <span class="product-label label-new">New</span>
                                            @if (!empty($productImage) && !empty($productImage->listImage()))
                                            <a href="{{ url($product->category_slug)}}">
                                                <img style="height:280px;width:100%;object-fit:cover;" src="{{ $productImage->listImage() }}" alt="{{ $product->title }}" class="product-image">
                                            </a>
                                            @endif
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            </div>
                                        </figure>

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="{{ url($product->category_slug.'/'.$product->sub_category_slug) }}">{{ $product->category_name }}</a>
                                            </div>
                                            <h3 class="product-title"><a href="{{ url($product->slug) }}">{{ $product->title }}</a></h3>
                                            <div class="product-price">
                                                {{ number_format($product->price, 2) }}TZS
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 20%;"></div>
                                                </div>
                                                <span class="ratings-text">( 2 Reviews )</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>

                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                {!! $showProduct->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </ul>
                        </nav> --}}

                        @include('front.product._list');
                    </div>

                </div>
                <aside class="col-lg-3 order-lg-first">

                    <form id="filterForm" action="" method="post">
                        @csrf
                        <input type="text" name="sub_category_id" id="get_subcategory_id">
                        <input type="text" name="brand_id" id="get_brand_id">
                        <input type="text" name="color_id" id="get_color_id">
                        <input type="text" name="sortBy_id" id="get_sortBy_id">
                        <input type="text" name="start_price" id="get_start_price">
                        <input type="text" name="end_price" id="get_end_price">
                    </form>
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div>

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach ($filterSubCategory as $filter_subcat)
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input changeCategory" value="{{ $filter_subcat->id }}" id="cat-{{ $filter_subcat->id }}">
                                                <label class="custom-control-label" for="cat-{{ $filter_subcat->id }}">{{ $filter_subcat->name }}</label>
                                            </div>
                                            <span class="item-count">{{ $filter_subcat->countProduct() }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                    Size
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-1">
                                                <label class="custom-control-label" for="size-1">XS</label>
                                            </div>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-2">
                                                <label class="custom-control-label" for="size-2">S</label>
                                            </div>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked id="size-3">
                                                <label class="custom-control-label" for="size-3">M</label>
                                            </div>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked id="size-4">
                                                <label class="custom-control-label" for="size-4">L</label>
                                            </div>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-5">
                                                <label class="custom-control-label" for="size-5">XL</label>
                                            </div>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-6">
                                                <label class="custom-control-label" for="size-6">XXL</label>
                                            </div>
                                        </div><!-- End .filter-item -->
                                    </div><!-- End .filter-items -->
                                </div>
                            </div>
                        </div>

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                    Colour
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-3">
                                <div class="widget-body">
                                    <div class="filter-colors">
                                        @foreach ($filterColor as $color)
                                        <a href="javascript:" class="changeColor" data-val="0" id="{{ $color->id }}" title="{{ $color->name}}" style="background: {{ $color->code }};"><span class="sr-only">{{ $color->name}}</span></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                    Brand
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        @foreach ($filterBrand as $brand)
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input changeBrand" value="{{ $brand->id }}" id="brand-{{ $brand->id }}">
                                                <label class="custom-control-label" for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                    Price
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range"></span>
                                        </div>

                                        <div id="price-slider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>




<script src="{{ url('public/assets-front/js/wNumb.js') }}"></script>
<script src="{{ url('public/assets-front/js/bootstrap-input-spinner.js') }}"></script>
<script src="{{ url('public/assets-front/js/nouislider.min.js') }}"></script>

<script>

$(document).ready(function () {

// Filter Price
if ( typeof noUiSlider === 'object' ) {
    var priceSlider  = document.getElementById('price-slider');

    noUiSlider.create(priceSlider, {
        start: [ 0, 10000 ],
        connect: true,
        step: 100,
        margin: 200,
        range: {
            'min': 0,
            'max': 15000
        },
        tooltips: true,
        format: wNumb({
            decimals: 0,
            prefix: 'TZS '
        })
    });

    priceSlider.noUiSlider.on('update', function( values, handle ){
        var start_price = values[0];
        var end_price = values[1];

        $('#get_start_price').val(start_price);
        $('#get_end_price').val(end_price);
        $('#filter-price-range').text(values.join(' - '));
        filterProduct();
    });
}


// Filter Sortby
$('.changeSortBy').change(function (e) {
    e.preventDefault();
    var id = $(this).val();
    $('#get_sortBy_id').val(id);
    filterProduct();
});


// Filter Category
$('.changeCategory').change(function (e) {
    e.preventDefault();
    var ids = '';
    $('.changeCategory').each(function () {
        if(this.checked)
        {
            var id = $(this).val();
            ids += id+',';
        }
    });
    $('#get_subcategory_id').val(ids);
    filterProduct();
});

// Filter Brand
$('.changeBrand').change(function (e) {
    e.preventDefault();
    var ids = '';
    $('.changeBrand').each(function () {
        if(this.checked)
        {
            var id = $(this).val();
            ids += id+',';
        }
    });
    $('#get_brand_id').val(ids);
    filterProduct();
});

// Filter Color
$('.changeColor').click(function (e) {
    e.preventDefault();

    var id = $(this).attr('id');
    var status = $(this).attr('data-val');
    if(status == 0)
    {
        $(this).attr('data-val', 1);
        $(this).addClass('active-color');

    }else{
        $(this).attr('data-val', 0);
        $(this).removeClass('active-color');
    }

    var ids = '';
    $('.changeColor').each(function () {
        var status = $(this).attr('data-val');
        if(status == 1)
        {
            var id = $(this).attr('id');
            ids += id+',';
        }
    });
    $('#get_color_id').val(ids);
    filterProduct();
});

// Filter Product
function filterProduct()
{
    $.ajax({
        type: "POST",
        url: "{{ url('filter_product' )}}",
        data: $('#filterForm').serialize(),
        dataType: "json",
        success: function (data) {
            $('#getProductAjax').html(data.success);

        },
        error:function(error){
            console.error();
        }
    });
}

});


</script>
@endsection
