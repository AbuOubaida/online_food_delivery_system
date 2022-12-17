
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Food Delivery System Registration Page</title>
    <link href="{{url("css/styles.css")}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                {{--                For Error message Showing--}}
                                @if ($errors->any())
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show z-index-1 w-auto error-alert" role="alert">
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
                                        <div class="alert alert-success alert-dismissible fade show z-index-1  w-auto error-alert" role="alert">
                                            <div>{{session('success')}}</div>
                                            <button type="button" class="close float-right" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                {{--                For Insert message Showing--}}
                                @if (session('error'))
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-dismissible fade show z-index-1 w-auto error-alert" role="alert">
                                            <div>{{session('error')}}</div>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                @if (session('warning'))
                                    <div class="col-12">
                                        <div class="alert alert-warning alert-dismissible fade show z-index-1 w-auto error-alert" role="alert">
                                            <div>{{session('warning')}}</div>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="fname" id="inputFirstName" type="text" placeholder="Enter your first name" value="{{old('fname')}}"/>
                                                <label for="inputFirstName">First name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input class="form-control" name="lname" id="inputLastName" type="text" placeholder="Enter your last name" value="{{old('lname')}}"/>
                                                <label for="inputLastName">Last name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" value="{{old('email')}}"/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input class="form-control" name="phone" id="phone" type="number" placeholder="phone" value="{{old('phone')}}"/>
                                                <label for="phone">Phone</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="home" id="home" type="number" placeholder="home" value="{{old('home')}}"/>
                                                <label for="home">Home No.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="village" id="village" type="text" placeholder="village" value="{{old('village')}}"/>
                                                <label for="village">Village</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="word_no" id="word_no" type="number" placeholder="word no" value="{{old('word_no')}}"/>
                                                <label for="word_no">Word No.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="union" id="union" type="text" placeholder="union" value="{{old('union')}}"/>
                                                <label for="union">Union</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row md-3">
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="upazila" id="upazila" type="text" placeholder="upazila" value="{{old('upazila')}}"/>
                                                <label for="upazila">Upazila</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="district" id="district" type="text" placeholder="district" value="{{old('district')}}"/>
                                                <label for="district">District</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="zip_code" id="zip_code" type="number" placeholder="zip code" value="{{old('zip_code')}}"/>
                                                <label for="zip_code">Zip Code</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="division" id="division" type="text" placeholder="division" value="{{old('division')}}"/>
                                                <label for="division">Division</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row md-3">
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" list="icons" name="country" id="country" value="{{old('country')}}">
                                                <label for="country">Country</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select class="form-control" name="roles" id="roles">
                                                    <option> please select your role </option>
                                                @if(count($roles)>0)
                                                    @foreach($roles as $r)
                                                    <option value="{{$r->name}}" @if(old('roles') == $r->name) selected @endif>{{$r->display_name}}</option>
                                                    @endforeach
                                                @endif
                                                </select>
                                                <label for="roles">User Roles</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPasswordConfirm" name="password_confirmation" type="password" placeholder="Confirm password" />
                                                <label for="inputPasswordConfirm">Confirm Password</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" value="Create Account"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="{{route('login')}}">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; {{date('Y')}}</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{url("js/scripts.js")}}"></script>
</body>
</html>
