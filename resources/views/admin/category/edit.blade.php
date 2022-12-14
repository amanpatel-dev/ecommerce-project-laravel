@extends('layouts.admin')

@section('content')
{{-- {{dd(asset('/uploads/category'.$category->image))}} --}}
  <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category
                    <a href="{{ url('admin/category/') }}" class="btn btn-primary btn-sm float-end"> Back</a>
                </h4>
                <div class="card-body">
                    <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                      
                        @csrf 
                        {{-- method put should be under the @csrf --}}
                         @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">
                                    Name
                                </label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control border border-dark" />
                                {{-- this is error is generated by the CategoryRequestFrom  --}}
                                @error('name')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">
                                    Slug
                                </label>
                                <input type="text" name="slug"  value="{{$category->slug}}" class="form-control border border-dark" />
                                @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                       
                        <div class="col-md-12 mb-3">
                            <label for="">
                                Description
                            </label>
                            <textarea type="text" name="description"   class="form-control border border-dark" rows="3">{{$category->description}}</textarea>
                            @error(' description')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">
                                    Image
                                </label>
                                <input type="file" name="image"  class="form-control border border-dark" />
                                <img height="100px" src="{{asset('uploads/category/'.$category->image)}}" alt="">
                                   @error('image ')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">
                                    Status<br>
                                </label>
                                <input type="checkbox" name="status"  value="{{$category->status==='1'? 'checked' : ''}}"  class="form-control form-check-input border border-dark" />
                                @error('status')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <h4>Seo Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">
                                Meta title
                            </label>
                            <input type="text" name="meta_title"  value="{{$category->meta_title}}" class="form-control border border-dark" rows="3" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">
                                Meta Keyword
                            </label>
                            <textarea type="text" name="meta_keyword"   class="form-control border border-dark" rows="3">{{$category->meta_keyword}}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">
                                Meta Description
                            </label>
                            <textarea type="text" name="meta_description" class="form-control border border-dark" rows="3"> {{$category->meta_description}}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save Edits</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
