@extends('seller.layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit Project' : 'Add Project' }}
    </div>
    <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($post) ? route('seller.posts.update',$post->id) : route('seller.posts.store') }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
            @method('put')
            @endif
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ isset($post) ? $post->title : '' }}">
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <input id="description" type="hidden" name="description"
                    value="{{ isset($post) ? $post->description : '' }}">
                <trix-editor input="description"></trix-editor>
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control"
                    value="{{ isset($post) ? $post->price : '' }}">
            </div>
            @if(isset($post))
            <div class="mb-3">
                <img style="width: 100%" src="{{ asset('storage/'.$post->image) }}" alt="">
            </div>
            @endif
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="subcategory">Category</label>
                <select name="subcategory" id="subcategory" class="form-control">
                    @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" @if(isset($post)) @if($subcategory->id ==
                        $post->subcategory_id)
                        selected
                        @endif
                        @endif
                        >{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="project">Upload Zip File</label>
                <input type="file" name="project" id="project" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">
                    {{ isset($post) ? 'Update Project' : 'Add Project' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"
    integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"
    integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection