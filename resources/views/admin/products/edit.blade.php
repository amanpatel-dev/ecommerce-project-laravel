@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add Product
                        <a href="{{ url('admin/products') }}" class="btn btn-primary btn-sm float-end">Back</a>
                    </h4>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-warning">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ url('admin/products/' . $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">Home</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                        data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                        aria-controls="seotag-tab-pane" aria-selected="false">SEO
                                        Tags</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                        data-bs-target="#details-tab-pane" type="button" role="tab"
                                        aria-controls="details-tab-pane" aria-selected="false">Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                        data-bs-target="#image-tab-pane" type="button" role="tab"
                                        aria-controls="image-tab-pane" aria-selected="false">Image</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade  border border-primary p-3 show active" id="home-tab-pane"
                                    role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="mb-3 ">
                                        <label for="">Category</label>
                                        <select name="category_id" id="" class="form-control border">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for=""> Product Name </label>
                                        <input type="text" name="name" value="{{ $product->name }}"
                                            class="form-control border">
                                    </div>
                                    <div class="mb-3">
                                        <label for=""> Product Slug </label>
                                        <input type="text" name="slug" value="{{ $product->slug }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Select Brand</label>
                                        <select name="brand" class="form-control" id="">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->name }}"
                                                    {{ $brand->name == $product->brand ? 'slected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for=""> Small Description</label>
                                        <textarea name="small_description"value="" class="form-control" id="" cols="30" rows="10">{{ $product->small_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for=""> Description</label>
                                        <textarea name="description" value="" class="form-control" id="" cols="30" rows="10">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade border p-3 " id="seotag-tab-pane" role="tabpanel"
                                    aria-labelledby="seotag-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label for=""> Meta Title </label>
                                        <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for=""> Meta Description</label>
                                        <textarea name="meta_description" class="form-control" value="" id="" cols="30"
                                            rows="10">{{ $product->meta_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for=""> Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" value=""id="" cols="30" rows="10">{{ $product->meta_keyword }}</textarea>
                                    </div>

                                </div>
                                <div class="tab-pane fade border p-3 " id="details-tab-pane" role="tabpanel"
                                    aria-labelledby="details-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label for=""> Original Price</label>
                                        <input type="text" name="original_price"
                                            value="{{ $product->original_price }}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for=""> Selling Price</label>
                                        <input type="text" name="selling_price"value="{{ $product->selling_price }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Quantity</label>
                                        <input type="text" name="quantity" value="{{ $product->quantity }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Trending</label>
                                        <input type="checkbox" name="trending"
                                            {{ $product->trending == '1' ? 'checked' : '' }}class="form-control form-check-input mt-0">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status"
                                            {{ $product->status == '1' ? 'checked' : '' }}class="form-control form-check-input mt-0">
                                    </div>
                                </div>
                                <div class="tab-pane fade border p-3  " id="image-tab-pane" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <div class="mb-3">
                                        <label for=""> Upload Product Image</label>
                                        <input type="file" name="image[]" multiple class="form-control">
                                    </div>
                                    <div>
                                        @if ($product->productImages)
                                            <div class="row">
                                                @foreach ($product->productImages as $image)
                                                    {{-- {{dd($image->id);}}  --}}
                                                    <div class="col-sm-4"><img src="{{ asset($image->image) }}"
                                                            alt="" style="width: 80px;height:auto;">
                                                        <div>
                                                            <a
                                                                href="{{ url('admin/product-image/' . $image->id . '/delete') }}">Remove</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <h5>No Image Added</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary"> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
