@extends('backend.layouts.app')

@section('pageName')
   Monthly Renew
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a href="{{ route('dashboard') }}" class=" btn btn-primary btn-sm text-light">Back</a>
                        <a class=" btn btn-primary btn-sm text-light">Total : {{ $monthlyRenewCount }}</a>
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
                                @foreach ($monthlyRenews as $monthlyRenew)
                                    <tr>
                                        <td>{{ ($monthlyRenews->currentpage() - 1) * $monthlyRenews->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $monthlyRenew->Subscriber->phone_num ?? '' }}</td>
                                        <td>{{ $monthlyRenew->Subscriber->name ?? 'Null' }}</td>
                                        <td>{{ $monthlyRenew->subscription_plan }}</td>
                                        <td>{{ $monthlyRenew->subscription_day }}</td>
                                        <td>{{ $monthlyRenew->amount }}</td>
                                        <td>{{ $monthlyRenew->created_at->diffForHumans() }}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                            
                        </table>
                        {{ $monthlyRenews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection