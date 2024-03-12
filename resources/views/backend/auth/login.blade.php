<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xoss Games</title>
    <link href="{{ asset('/assets/backend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bg {
            background-color: #111114
        }

    </style>
</head>

<body class="bg">
    <div class="conatainer">
        <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
            <div class="col-md-4">
            @if(session('error'))
              <div class="alert alert-success">{{ session('error') }} </div>
            @endif
                <h1 class="text-center mt-4 text-white">Login</h1>
                <form action="{{ route('admin.login.process') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ old('email') }}">
                        @error('email')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        @error('password')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
