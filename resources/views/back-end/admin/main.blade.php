
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <x-admin._header_link/>
</head>
<body class="sb-nav-fixed">
<x-admin._header/>
<div id="layoutSidenav">
    <x-admin._sidebar/>
    <div id="layoutSidenav_content">
        {{--                For Error message Showing--}}
        @if ($errors->any())
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show z-index-1 position-absolute w-auto error-alert" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        {{--                For Insert message Showing--}}
        @if (session('success'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show z-index-1 position-absolute w-auto error-alert" role="alert">
                    <div>{{session('success')}}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        {{--                For Insert message Showing--}}
        @if (session('error'))
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show z-index-1 position-absolute w-auto error-alert" role="alert">
                    <div>{{session('error')}}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @if (session('warning'))
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible fade show z-index-1 position-absolute w-auto error-alert" role="alert">
                    <div>{{session('warning')}}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @yield('content')
        <x-admin._footer/>
    </div>
</div>
<x-admin._footer_link/>
</body>
</html>
