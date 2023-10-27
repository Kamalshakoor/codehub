@extends('admin.layouts.app')

@section('content')
<div class="card card-default">
  <div class="card-header">
    Subscribers
  </div>
  <div class="card-body">
    @if($subscribers->count()>0)
    <table class="table">
      <thead>
        <tr>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($subscribers as $subscriber)
        <tr>
          <td>{{$subscriber->email}}</td>
          <td>
            <form action="{{ route('admin.subscriber.destroy', $subscriber->id) }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger btn-sm">
                delete
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3 class="text-center">No subscribers yet.</h3>
    @endif
  </div>
</div>

<div class="mt-3">
  {{ $subscribers->links() }}
</div>
@endsection