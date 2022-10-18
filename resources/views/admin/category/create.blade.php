@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Add Category
                    <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end"> Back</a>
                </h4>
                <div class="card-body">
                    <form action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">
                                    Name
                                </label>
                                <input type="text" name="name" class="form-control border border-dark" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">
                                    Slug
                                </label>
                                <input type="text" name="slug" class="form-control border border-dark" />
                            </div>
                        </div>
                       
                        <div class="col-md-12 mb-3">
                            <label for="">
                                Description
                            </label>
                            <textarea type="text" name="description" class="form-control border border-dark" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">
                                    Image
                                </label>
                                <input type="file" name="image" class="form-control border border-dark" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">
                                    Status<br>
                                </label>
                                <input type="checkbox" name="status" class="form-control form-check-input border border-dark" />
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <h4>Seo Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">
                                Meta title
                            </label>
                            <input type="text" name="meta_title" class="form-control border border-dark" rows="3" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">
                                Meta Keyword
                            </label>
                            <textarea type="text" name="meta_keyword" class="form-control border border-dark" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">
                                Meta Description
                            </label>
                            <textarea type="text" name="meta_description" class="form-control border border-dark" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
