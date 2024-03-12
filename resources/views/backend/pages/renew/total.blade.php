@extends('backend.layouts.app')

@section('pageName')
   Total Renew
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a href="{{ route('dashboard') }}" class=" btn btn-primary btn-sm text-light">Back</a>
                        <a class=" btn btn-primary btn-sm text-light">Total : {{ $totalRenewCount }}</a>
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
                                @foreach ($totalRenews as $totalRenew)
                                    <tr>
                                        <td>{{ ($totalRenews->currentpage() - 1) * $totalRenews->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $totalRenew->Subscriber->phone_num ?? '' }}</td>
                                        <td>{{ $totalRenew->Subscriber->name ?? 'Null' }}</td>
                                        <td>{{ $totalRenew->subscription_plan }}</td>
                                        <td>{{ $totalRenew->subscription_day }}</td>
                                        <td>{{ $totalRenew->amount }}</td>
                                        <td>{{ $totalRenew->created_at->diffForHumans() }}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                            
                        </table>
                        {{ $totalRenews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection