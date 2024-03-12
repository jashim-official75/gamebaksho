@extends('backend.layouts.app')

@section('pageName')
    Support
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Support List</h4>
                    <h5 class="card-subtitle">Total support requests <b>{{ $supports->total() }}</b></h5>

                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Reason</th>
                                    <th>S_Numb</th>
                                    <th>S_Numb</th>
                                    <th>Message</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($supports as $support)
                                    <tr class="">

                                        <td>{{ $loop->index + 1 }}
                                        </td>
                                        <td>{{ $support->name }}</td>
                                        <td><a href="mailto:{{ $support->email }}">{{ $support->email }}</a></td>
                                        <td>{{ $support->phone_number }}</td>
                                        <td>
                                            @if ($support->reason == 1)
                                            Login Problem
                                            @elseif ($support->reason == 2)
                                            Subscription Problem
                                            @else
                                            Others Problem 
                                            @endif
                                        </td>
                                        <td>{{ $support->regis_number }}</td>
                                        <td>{{ $support->subscrb_number }}</td>
                                        <td>{{ Str::limit($support->message, 40) }}</td>
                                        <td>
                                            <a href="{{ route('admin.newsupport.delete', $support->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>

                                    <td colspan="5">
                                        <div class="text-right d-flex justify-content-end">
                                            {{ $supports->links() }}
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
