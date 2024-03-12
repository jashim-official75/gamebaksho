@extends('backend.layouts.app')

@section('pageName')
   Weekly Renew
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a href="{{ route('dashboard') }}" class=" btn btn-primary btn-sm text-light">Back</a>
                        <a class=" btn btn-primary btn-sm text-light">Total : {{ $weeklyRenewCount }}</a>
                    </div>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Phone</th>
                                    <th>Name</th>
                                    <th>Plan</th>
                                    <th>Day</th>
                                    <th>Amount</th>
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($weeklyRenews as $weeklyRenew)
                                    <tr>
                                        <td>{{ ($weeklyRenews->currentpage() - 1) * $weeklyRenews->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $weeklyRenew->Subscriber->phone_num ?? '' }}</td>
                                        <td>{{ $weeklyRenew->Subscriber->name ?? 'Null' }}</td>
                                        <td>{{ $weeklyRenew->subscription_plan }}</td>
                                        <td>{{ $weeklyRenew->subscription_day }}</td>
                                        <td>{{ $weeklyRenew->amount }}</td>
                                        <td>{{ $weeklyRenew->created_at->diffForHumans() }}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                            
                        </table>
                        {{ $weeklyRenews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection