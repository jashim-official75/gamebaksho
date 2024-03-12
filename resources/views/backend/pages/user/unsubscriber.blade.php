@extends('backend.layouts.app')

@section('pageName')
    Unsubscribed Users
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a href="{{ route('admin.subscriber') }}" class=" btn btn-sm btn-info text-light">Back</a>
                        <a href="{{ route('admin.unsubscriber_user.excel') }}" class=" btn btn-sm btn-info text-light">Export Excel</a>
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
                                @foreach ($unsubscribers as $unsubscriber)
                                    <tr>
                                        <td>{{ ($unsubscribers->currentpage() - 1) * $unsubscribers->perpage() + $loop->index + 1 }}
                                        </td>
                                        <td>{{ $unsubscriber?->Subscriber->phone_num }}</td>
                                        <td>{{ $unsubscriber?->Subscriber->name ?? 'null' }}</td>
                                        <td>{{ $unsubscriber->subscription_plan }}</td>
                                        <td>{{ $unsubscriber->subscription_day }}</td>
                                        <td>{{ $unsubscriber->amount }}</td>
                                        <td>{{ $unsubscriber->renew }}</td>
                                        <td>{{ $unsubscriber->created_at->diffForHumans() }}</td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        {{ $unsubscribers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
