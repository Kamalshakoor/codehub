@extends('seller.layouts.app')

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
          @if($total != 0)
          @if($seller->bank_name==null || $seller->account_holder_name==null || $seller->account_number==null)
          <td>
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Withdraw
            </button>
          </td>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Provide Your Account Detail</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('seller.account-detail',$seller->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                      <label for="bank_name" class="form-label">Enter Bank Name</label>
                      <input type="text" class="form-control" id="bank_name" name="bank_name"
                        aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="account_holder_name" class="form-label">Account Holder Name</label>
                      <input type="text" class="form-control" id="account_holder_name" name="account_holder_name">
                    </div>
                    <div class="mb-3">
                      <label for="account_number" class="form-label">Account Number</label>
                      <input type="text" class="form-control" id="account_number" name="account_number">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @else
          <td>
            <form action="{{route('seller.balance.withdraw')}}" method="post">
              @csrf
              @method('put')
              <button type="submit" class="btn btn-success btn-sm">Withdraw</button>
            </form>
          </td>
          @endif
          @else
          <td>
            <h4>No Funds Available</h4>
          </td>
          @endif
        </tr>
        </tr>
      </tbody>
    </table>
    @else
    <h3 class="text-center">No Balance Yet</h3>
    @endif
  </div>
</div>
@endsection