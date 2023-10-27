@extends('admin.layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">Complaints</div>
  <div class="card-body">
    @if($complaints->count()>0)
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Seller Name</th>
          <th>Project Title</th>
          <th>Phone Number</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($complaints as $complaint)
        <tr>
          <td>{{ $complaint->seller_name }}</td>
          <td>{{ $complaint->project_title }}</td>
          <td>{{ $complaint->number }}</td>
          <td>
            <a href="{{ route('admin.complaint-detail',$complaint->id) }}" class="btn btn-info btn-sm">show</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3 class="text-center">No Complaints Yet</h3>
    @endif
  </div>
</div>
@endsection