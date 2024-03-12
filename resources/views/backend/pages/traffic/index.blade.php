@extends('backend.layouts.app')

@section('pageName')
    Traffic
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a class=" btn btn-primary text-light">Total Traffic : {{ $TotalTraffic }}</a>
                        <a class=" btn btn-info text-light">Today Traffic : {{ $TodayTraffic }}</a>
                        <a class=" btn btn-success text-dark">Previous Day Traffic : {{ $previousTraffic }}</a>
                    </div>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ip</th>
                                    <th>Country</th>
                                    <th>Device</th>
                                    <th>count_trafic</th>
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($traffics as $traffic)
                                    <tr>
                                        <td>{{ ($traffics->currentpage() - 1) * $traffics->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $traffic->ip }}</td>
                                        <td>{{ $traffic->country ?? 'NULL' }}</td>
                                        <td>{{ $traffic->is_device }}</td>
                                        <td>{{ $traffic->source ?? "null" }}</td>
                                        <td>{{ $traffic->count_trafic }}</td>
                                        <td>{{ $traffic->created_at->diffForHumans() }}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                            
                        </table>
                        {{ $traffics->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection