@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Colors
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm float-end"> Add Color</a>
                    </h4>
                    <div class="card-body">
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
