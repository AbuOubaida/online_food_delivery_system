@extends('client-site.main')
@section('content')
{{--<x-client._page_header /> --}}{{--<header slider section>--}}
<section id="page-title" class="page-title bg-overlay bg-parallax bg-overlay-gradient">
    <div class="bg-section">
        <img src="{{url("client-site/images/page-title/6.jpg")}}" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            @if(isset($pageInfo))
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="title title-4 text-center">
                        <div class="title--content">
                            <div class="title--subtitle">{{$pageInfo['parent']}}</div>
                            <div class="title--heading">
                                <h1>{{$pageInfo['this']}}</h1>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <ol class="breadcrumb">
                            @if(isset($pageInfo['root']) && isset($pageInfo['rootRoute']))
                                <li><a href="{{route($pageInfo['rootRoute'])}}">{{$pageInfo['root']}}</a></li>
                            @endif
                            @if(isset($pageInfo['parent']) && isset($pageInfo['parentRoute']))
                                <li><a href="{{route($pageInfo['parentRoute'])}}">{{$pageInfo['parent']}}</a></li>
                            @endif
                            @if(isset($pageInfo['this']))
                                <li class="active">{{$pageInfo['this']}}</li>
                            @endif



                        </ol>
                        <div class="divider--shape-1down divider--shape-gray"></div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>
{{--product section--}}
<section id="product" class="shop shop-product bg-gray pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12  col-md-12">

                <div class="product-img mb-50 text-center">
                    <img class="img-responsive d-inline-block" src="{{url("assets/back-end/vendor/product/").'/'.$product->p_image}}" alt="product image">
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="product-title">
                            <h3>{{$product->p_name}}</h3>
                        </div>
                        <div class="product-meta mb-30">
                            <div class="product-price pull-left pull-none-xs">
                                BDT {{$product->p_price}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-action clearfix">

                            <div class="product-cta text-center-xs">
                                <a class="btn btn--primary" href="{{route('name.add.to.cart',['PID'=>$product->id])}}">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-desc">
                            <p>{{$product->p_details}}</p>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="product-details">
                    <h5>Other Details :</h5>
                    <ul class="list-unstyled">
                        <li>Category : <span>{{$product->category_name}}</span></li>
{{--                        <li>Code : <span>#0214</span></li>--}}
                        <li>Availabiltity : <span>@if($product->p_status == '1') <span class="text-success">Available</span> @else <span class="text-danger">Unavailable</span>@endif</span></li>
{{--                        <li>Brand : <span>Book</span></li>--}}
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>
@stop
