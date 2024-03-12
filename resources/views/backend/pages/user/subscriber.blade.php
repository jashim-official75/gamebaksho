@extends('backend.layouts.app')

@section('pageName')
    Subscribed Users
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a href="{{ route('admin.subscriber') }}" class=" btn btn-info btn-sm text-light">Back</a>
                        <a href="#" class=" btn btn-info btn-sm text-light">Total : {{ $subscribers_count }}</a>
                        <a href="{{ route('admin.subscriber_user.excel') }}" class=" btn btn-info btn-sm text-light">Export Excel</a>
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
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $subscriber)
                                    <tr>
                                        <td>{{ ($subscribers->currentpage() - 1) * $subscribers->perpage() + $loop->index + 1 }}
                                        </td>
                                        <td>{{ $subscriber?->Subscriber->phone_num }}</td>
                                        <td>{{ $subscriber?->Subscriber->name ?? 'null' }}</td>
                                        <td>{{ $subscriber->subscription_plan }}</td>
                                        <td>{{ $subscriber->subscription_day }}</td>
                                        <td>{{ $subscriber->amount }}</td>
                                        <td>{{ $subscriber->renew }}</td>
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
