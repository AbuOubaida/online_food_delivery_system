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
            url: '{{ url('update-cart') }}',
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
