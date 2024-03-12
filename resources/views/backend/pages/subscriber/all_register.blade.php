@extends('backend.layouts.app')

@section('pageName')
    Users
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a class=" btn btn-info text-light btn-sm">Today : {{ $today_user }}</a>
                        <a class=" btn btn-success text-dark btn-sm">Monthly : {{ $monthly_user }}</a>
                        <a href="{{ route('admin.users') }}" class=" btn btn-primary btn-sm text-light">Total : {{ $total_user }}</a>
                    </div>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Phone</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ($users->currentpage() - 1) * $users->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $user->phone_num }}</td>
                                        <td>{{ $user->name ?? 'null' }}</td>
                                        <td>
                                            @if ($user?->PurchaseDetails)
                                                @foreach ($user?->PurchaseDetails as $purchase_detail)
                                                    @if ($loop->last)
                                                        @if ($purchase_detail->unsubscribed == 0)
                                                            <a class="btn btn-sm btn-primary text-white">Subscribe</a>
                                                        @else
                                                            <a class="btn btn-sm btn-warning text-white">Unsubscribe</a>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif

                                        </td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
