<div>
    @forelse ($products as $productItem)
    <div class="col-md-3">
        <div class="product-card">
            @if ($productItem->quantity > 0)
                <label class="stock bg-success">In Stock</label>
            @else
                <label class="stock bg-danger">Out of Stock</label>
            @endif
            <div class="product-card-img d-flex justify-content-center p-3">

                @if ($productItem->productImages->count() > 0)
                    <a
                        href="{{ asset('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                        <img src="{{ asset($productItem->productImages[0]->image) }}" class="img-fluid"
                            alt="">
                    </a>
                @endif
            </div>
            <div class="product-card-body">
                <p class="product-brand">{{ $productItem->brand }}</p>
                <h5 class="product-name">
                    <a
                        href="{{ asset('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                        {{ $productItem->name }}
                    </a>
                </h5>
                <div>
                    <span class="selling-price">{{ $productItem->selling_price }}</span>
                    <span class="original-price">{{ $productItem->original_price }}</span>
                </div>
                <div class="mt-2">
                    <a href="" class="btn btn1">Add To Cart</a>
                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                    <a href="" class="btn btn1"> View </a>
                </div>
            </div>
        </div>
    </div>

@empty
@endforelse
</div>
