@extends('admin.layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">Customproject Requests</div>
  <div class="card-body">
    @if($customprojects->count()>0)
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Name</th>
          <th>email</th>
          <th>Phone Number</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($customprojects as $customproject)
        <tr>
          <td>{{ $customproject->name }}</td>
          <td>{{ $customproject->email }}</td>
          <td>{{ $customproject->number }}</td>
          <td>
            <a href="{{ route('admin.customproject-detail',$customproject->id) }}" class="btn btn-info btn-sm">show</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3 class="text-center">No customprojects Yet</h3>
    @endif
  </div>
</div>
@endsection