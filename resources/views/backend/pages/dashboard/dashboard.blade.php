@extends('backend.layouts.app')

@section('pageName')
    Dashboard
@endsection

@section('content')
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h2>
                        <h3 class=""><a href="{{ route('games.index') }}">{{ $total_games }}</a></h3>
                        <h6 class="card-subtitle">Total Games</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                        <h3 class=""><a href="{{ route('admin.users') }}">{{ $all_users }}</a></h3>
                        <h6 class="card-subtitle">All Users</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple"></i></h2>
                        <h3 class=""><a href="{{ route('admin.subscriber') }}">{{ $all_subscriber }}</a></h3>
                        <h6 class="card-subtitle">Total Subscriber</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->




        <!-- Column -->
        {{-- <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                        <h3 class="">$30010</h3>
                        <h6 class="card-subtitle">Total Earnings</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <!---subscriber filter ----------->
    <h3>Subscriber Filter</h3>
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <input type="date" name="date" id="SelectDate" class="mb-2">
                        <h3 id="total_daily_sub">0</h3>
                        <h6 class="card-subtitle">Daily Subscriber</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <input type="month" name="month" id="SelectMonth" class="mb-2">
                        <h3 id="total_monthly_sub">0</h3>
                        <h6 class="card-subtitle">Monthly Subscriber</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <select name="year" id="SelectYear" class="mb-2">
                            <option value="">-select year-</option>
                            @foreach ($years as $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                            @endforeach
                        </select>
                        <h3 id="total_yearly_sub">0</h3>
                        <h6 class="card-subtitle">Yearly Subscriber</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-------subscriber filter end --------------->

    <div class="card-group">
        <!---Previous Traffic -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-account-multiple text-info"></i></h2>
                        <h3 class=""><a href="#">{{ $previousTraffic }}</a></h3>
                        <h6 class="card-subtitle">Previous Day Traffic</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---Today Traffic -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-motorbike text-info"></i></h2>
                        <h3 class=""><a href="#">{{ $TodayTraffic }}</a></h3>
                        <h6 class="card-subtitle">Today Traffic</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---Total Traffic -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-account-multiple-plus text-info"></i></h2>
                        <h3 class=""><a href="#">{{ $TotalTraffic }}</a></h3>
                        <h6 class="card-subtitle">Total Traffic</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----- today and total renew  --------->
    @if (auth()->user()->Role->slug == 'admin')
        <h3>All Renew</h3>
        <div class="row">
            <!---Today renew -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('admin.today.renew') }}">
                                    <h3 class="">{{ $todayRenew }}</h3>
                                    <h6 class="card-subtitle">Today Renew</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!---Weekly renew -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('admin.weekly.renew') }}">
                                    <h3 class="">{{ $weeklyRenew }}</h3>
                                    <h6 class="card-subtitle">Weekly Renew</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!---Monthly renew -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('admin.monthly.renew') }}">
                                    <h3 class="">{{ $monthlyRenew }}</h3>
                                    <h6 class="card-subtitle">Monthly Renew</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!---Total renew -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('admin.total.renew') }}">
                                    <h3 class="">{{ $totalRenew }}</h3>
                                    <h6 class="card-subtitle">Total Renew</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif

        <!-----renew --------->
    @if (auth()->user()->Role->slug == 'admin')
        <div class="das_renew">
            <div class="das_renew_head">
                <h3>Renew</h3>
            </div>

            <div class="renew_body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Time : 8.00 AM</h3>
                            </div>
                            <div class="card-body">
                                <a name="{{ route('admin.renew') }}"
                                    class="btn btn-primary text-white renew_confirm">Renew</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Time : 1.00 PM</h3>
                            </div>
                            <div class="card-body">
                                <a name="{{ route('admin.renew') }}"
                                    class="btn btn-primary text-white renew_confirm">Renew</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Time : 3.00 PM</h3>
                            </div>
                            <div class="card-body">
                                <a name="{{ route('admin.renew') }}"
                                    class="btn btn-primary text-white renew_confirm">Renew</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- ============================================================== -->
    <!-- End PAge Content -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            //---seetalert confirm message ----
            $('.renew_confirm').click(function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "If you renew this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, renew it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var link = $(this).attr('name');
                        window.location.href = link;
                    }
                })
            });

            //----select date and show subscriber ----
            $('#SelectDate').change(function(event) {
                event.preventDefault();
                let date = $('#SelectDate').val();
                // alert(date);
                $.ajax({
                    url: '{{ url('/admin/select_date/subscriber_count') }}',
                    method: 'GET',
                    data: {
                        date: date,
                    },
                    success: function(response) {
                        $('#total_daily_sub').text(response);
                        // alert(response);
                    },
                    error: function(xhr) {
                        // Handle errors here
                        console.log(xhr);
                    }
                });
            });
            //----SelectMonth and show subscriber ----
            $('#SelectMonth').change(function(event) {
                event.preventDefault();
                let month = $('#SelectMonth').val();
                // alert(month);
                $.ajax({
                    url: '{{ url('/admin/select_month/subscriber_count') }}',
                    method: 'GET',
                    data: {
                        month: month,
                    },
                    success: function(response) {
                        $('#total_monthly_sub').text(response);
                        // alert(response);
                    },
                    error: function(xhr) {
                        // Handle errors here
                        console.log(xhr);
                    }
                });
            });
            //----SelectYear and show subscriber ----
            $('#SelectYear').change(function(event) {
                event.preventDefault();
                let year = $('#SelectYear').val();
                // alert(year);
                $.ajax({
                    url: '{{ url('/admin/select_year/subscriber_count') }}',
                    method: 'GET',
                    data: {
                        year: year,
                    },
                    success: function(response) {
                        $('#total_yearly_sub').text(response);
                        // alert(response);
                    },
                    error: function(xhr) {
                        // Handle errors here
                        console.log(xhr);
                    }
                });
            });
        });
    </script>
@endsection