
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                                @foreach ($subscribers as $index=>$subscriber)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
