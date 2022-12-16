<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Elegant Restaurant & Cafe Html5 Template" />
{{--    <link href="{{url("client-site//images/favicon/favicon.png")}}" rel="icon" />--}}
    <x-client._header_link/>

    <title>{{$headerData['app']}} || {{$headerData['role']}} || {{$headerData['title']}}</title>
</head>
<body>
{{--<div class="preloader">--}}
{{--    <div class="spinner">--}}
{{--        <div class="bounce1"></div>--}}
{{--        <div class="bounce2"></div>--}}
{{--        <div class="bounce3"></div>--}}
{{--    </div>--}}
{{--</div>--}}

<div id="wrapper" class="wrapper clearfix">
    <x-client._header_nav /> {{--<header navigation section>--}}
    @yield('content') <!-- all page load here-->
    <div class="clearfix"></div>
    <x-client._footer/>
</div>
<x-client._footer_link/>
</body>
</html>
