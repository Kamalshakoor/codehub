@extends('admin.layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">Complaint detail</div>
  <div class="card-body">
    {{ $complaint->message }}
  </div>
</div>
@endsection