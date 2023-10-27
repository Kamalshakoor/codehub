@extends('admin.layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">Balance</div>
  <div class="card-body">
    @if($total > 0 || $total == 0)
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Total Balance</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>${{ $total }}</td>
        </tr>
      </tbody>
    </table>
    @else
    <h3 class="text-center">No Balance Yet</h3>
    @endif
  </div>
</div>
@endsection