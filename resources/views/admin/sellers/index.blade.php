@extends('admin.layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">Sellers</div>
    <div class="card-body">
        @if($sellers->count()>0)
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Projects</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sellers as $seller)
                <tr>
                    <td>{{ $seller->name }}</td>
                    <td>{{ $seller->email }}</td>
                    <td>{{ $seller->posts->count() }}</td>
                    <td>
                        <form action="{{ route('admin.sellers.delete',$seller->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No Sellers Yet</h3>
        @endif
    </div>
</div>
@endsection