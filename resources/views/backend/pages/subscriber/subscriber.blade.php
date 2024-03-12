@extends('backend.layouts.app')

@section('pageName')
    Subscribers
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a href="{{ route('admin.subscriber') }}" class=" btn btn-sm btn-primary text-light">Total : {{ $total_sub }}</a>
                        <a class=" btn btn-info btn-sm text-light">Today : {{ $today_sub }}</a>
                        <a class=" btn btn-success btn-sm text-dark">Monthly : {{ $monthly_sub }}</a>
                        <a href="{{ route('admin.current.subscriber') }}" class=" btn btn-sm btn-primary text-light">Current Subscribe : {{ $current_subscriber }}</a>
                        <a href="{{ route('admin.user.subscriber') }}" class=" btn btn-sm btn-primary text-light">Renew Subscribe : {{ $subscribers_count }}</a>
                        <a href="{{ route('admin.user.unsubscribe') }}" class=" btn btn-sm btn-primary text-light">Unsubscribe : {{ $unsubscribers }}</a>
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
                                    <th>Renew</th>
                                    <th>Status</th>
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $subscriber)
                                    <tr>
                                        <td>{{ ($subscribers->currentpage() - 1) * $subscribers->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $subscriber->Subscriber->phone_num }}</td>
                                        <td>{{ $subscriber->Subscriber->name ?? 'Null' }}</td>
                                        <td>{{ $subscriber->subscription_plan }}</td>
                                        <td>{{ $subscriber->subscription_day }}</td>
                                        <td>{{ $subscriber->amount }}</td>
                                        <td>{{ $subscriber->renew }}</td>
                                        <td>
                                            @if ($subscriber->unsubscribed == 0)
                                                <a class="btn btn-sm btn-primary text-light">Subscriber</a>
                                            @else
                                            <a class="btn btn-sm btn-warning">Unsubscriber</a>
                                            @endif
                                        </td>
                                        <td>{{ $subscriber->created_at->diffForHumans() }}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                            
                        </table>
                        {{ $subscribers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection