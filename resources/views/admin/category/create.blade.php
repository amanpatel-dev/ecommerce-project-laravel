@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Add Category
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end"> Back</a>
                </h4>
                <div class="card-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="">
                                Name
                            </label>
                            <input type="text" name="name" class="form-control"/>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
