@extends('admin.layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">Projects</div>
    <div class="card-body">
        @if($posts->count()>0)
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    {{-- <th>Status</th> --}}
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td><img src="{{ asset('storage/'.$post->image) }}" width="80px" height="50px"></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->subcategory->category->name }}</td>
                    {{-- @if($post->status == false)
                    <td>
                        <form action="{{ route('admin.approve-project',$post->id) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-success btn-sm">Aprove</button>
                        </form>
                    </td>
                    @else
                    <td>Approved</td>
                    @endif --}}
                    <td>
                        <a href="{{ route('admin.show-project',$post->id) }}" class="btn btn-info btn-sm">show</a>
                    </td>
                    {{-- <td>
                        <a href="{{ route('admin.destroy-project',$post->id) }}"
                            class="btn btn-danger btn-sm">delete</a>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No Projects Yet</h3>
        @endif
    </div>
</div>
@endsection