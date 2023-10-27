@extends('admin.layouts.app')

@section('content')

<div class="row text-center">
    <div class="col-sm-4 mt-2">
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">No. of Selllers</div>
            <div class="card-body">
                <h4 class="card-title">
                    {{ $sellers_count }}
                </h4>
                <a class="btn text-white" href="{{ route('admin.sellers.index') }}">View</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 mt-2">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">No. of Projects</div>
            <div class="card-body">
                <h4 class="card-title">
                    {{ $posts_count }}
                </h4>
                <a class="btn text-white" href="{{ route('admin.projects') }}">View</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 mt-2">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header">No. of Orders</div>
            <div class="card-body">
                <h4 class="card-title">
                    {{ $orders_count }}
                </h4>
                <a class="btn text-white" href="{{ route('admin.orders') }}">View</a>
            </div>
        </div>
    </div>
</div>
@endsection