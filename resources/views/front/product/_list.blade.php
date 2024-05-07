<div class="products mb-3">
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
</nav>
