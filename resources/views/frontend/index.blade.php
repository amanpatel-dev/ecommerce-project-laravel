@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">

        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">

                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>{!! $sliderItem->title !!}</h1>
                            <p>
                                {{ $sliderItem->description }}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2>
                        Welcome to Ecommerce
                    </h2>
                    <div class="underline">

                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste ullam consectetur laboriosam eveniet
                        rerum corporis quidem voluptas. Sapiente rem adipisci perferendis enim in rerum eos iste optio iusto
                        a, amet quam, perspiciatis voluptas expedita!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <h1>Trendings 📈📈📈</h1>
                    <div class="underline"></div>
                    <div class="row ">
                        <div class="col-md-4  owl-carousel owl-theme ">
                        @forelse ($trendingProducts as $productItem)
                                <div class="item">
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
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        class="img-fluid" alt="">
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
                            <div class="col-md-12">
                                <div class="p-2">
                                    <h3>No Product Available</h3>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        jQuery(document).ready(function() {
            jQuery('.owl-carousel ').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        });
    </script>
@endsection
