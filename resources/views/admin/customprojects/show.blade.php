@extends('admin.layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">Customproject detail</div>
  <div class="card-body">
    {{ $customproject->message }}
  </div>
</div>
@endsection