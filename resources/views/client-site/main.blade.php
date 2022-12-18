<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Elegant Restaurant & Cafe Html5 Template" />
{{--    <link href="{{url("client-site//images/favicon/favicon.png")}}" rel="icon" />--}}
    <x-client._header_link/> <!--Components from views -->

    <title>{{$headerData['app']}} || {{$headerData['role']}} || {{$headerData['title']}}</title>
</head>
<body>

<div id="wrapper" class="wrapper clearfix">
    <x-client._header_nav /> {{--<header navigation section>--}} <!--Components from views -->
    @if ($errors->any())
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show z-index-1 w-auto error-alert right-0" role="alert">
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
            <div class="alert alert-success alert-dismissible fade show z-index-1 right-0 w-auto error-alert" role="alert">
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
            <div class="alert alert-danger alert-dismissible fade show z-index-1 right-0 w-auto error-alert" role="alert">
                <div>{{session('error')}}</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if (session('warning'))
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show z-index-1 right-0 w-auto error-alert" role="alert">
                <div>{{session('warning')}}</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @yield('content') <!-- all page load here-->
    <div class="clearfix"></div>
    <x-client._footer/> <!--Components from views -->
</div>
<x-client._footer_link/> <!--Components from views -->
<script type="text/javascript">
    // this function is for update card
    $(".update-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
            success: function (response) {
                window.location.reload();
            }
        });
    });
    $(".cart-product-remove").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure")) {
            $.ajax({
                url: '{{ route('delete.cart') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    window.location.reload();

                }
            });
        }
    });
</script>
</body>
</html>
