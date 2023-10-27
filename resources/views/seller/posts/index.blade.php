@extends('seller.layouts.app')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{ route('seller.posts.create') }}" class="btn btn-success mb-2">Add Project</a>
</div>
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
                    <td><img width="80px" height="50px" src="{{ asset('storage/'.$post->image) }}" alt=""></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->subcategory->category->name }}</td>
                    {{-- @if($post->status == false)
                    <td>Pending</td>
                    @else
                    <td>Approved</td>
                    @endif --}}
                    <td>
                        <a href="{{ route('seller.posts.edit',$post->id) }}" class="btn btn-info btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('seller.posts.destroy',$post->id) }}" method="post">
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
        <h3 class="text-center">No Projects Yet</h3>
        @endif
    </div>
</div>

<div class="mt-4">
    {{ $posts->links() }}
</div>
@endsection