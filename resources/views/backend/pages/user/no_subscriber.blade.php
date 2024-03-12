@extends('backend.layouts.app')

@section('pageName')
    No Subscribed Users
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a href="{{ route('admin.users') }}" class=" btn btn-sm btn-info text-light">Back</a>
                        <a href="{{ route('admin.nosubscriber.user.excel') }}" class=" btn btn-sm btn-info text-light">Export Excel</a>
                    </div>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Phone</th>
                                    <th>Name</th>
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersNotUsedInPurchaseDetails as $usersNotUsedInPurchaseDetail)
                                    <tr>
                                        <td>{{ ($usersNotUsedInPurchaseDetails->currentpage() - 1) * $usersNotUsedInPurchaseDetails->perpage() + $loop->index + 1 }}
                                        </td>
                                        <td>{{ $usersNotUsedInPurchaseDetail->phone_num }}</td>
                                        <td>{{ $usersNotUsedInPurchaseDetail->name ?? 'null' }}</td>
                                        <td>{{ $usersNotUsedInPurchaseDetail->created_at->diffForHumans() }}</td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        {{ $usersNotUsedInPurchaseDetails->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
