@extends('admin.layouts.app')

@section('content')
<h2 class="text-center my-3">{{ $post->title }}</h2>
<img src="{{ asset('storage/'.$post->image) }}" style="width: 100%">
<p class="my-5">{!! $post->description !!}</p>
<span class="badge rounded-pill bg-success">{{ $post->subcategory->category->name }}</span>
<span class="badge rounded-pill bg-success">{{ $post->subcategory->name }}</span>
<span class="badge rounded-pill bg-success">Price: {{ $post->price }}</span>
@endsection