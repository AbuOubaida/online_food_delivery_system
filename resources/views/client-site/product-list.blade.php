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
<section id="shop" class="shop shop-3 bg-gray pb-90">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12  col-md-12">
                        <div class="shop-options">
                            <div class="product-options2 pull-left pull-none-xs">
                                <ul class="list-inline">
                                    <li>
                                        <div class="product-sort mb-15-xs">
                                            <span>Sort by:</span>
                                            <i class="fa fa-angle-down"></i>
                                            <select>
                                                <option selected="" value="Default">Product Name</option>
                                                <option value="Larger">Newest Items</option>
                                                <option value="Larger">oldest Items</option>
                                                <option value="Larger">Hot Items</option>
                                                <option value="Small">Highest Price</option>
                                                <option value="Medium">Lowest Price</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-options2 pull-right pull-none-xs">
                                <ul class="list-inline">
                                    <li>
                                        <div class="product-sort">
                                            <span>Show:</span>
                                            <i class="fa fa-angle-down"></i>
                                            <select>
                                                <option selected="" value="10">10 items / page</option>
                                                <option value="25">25 items / page</option>
                                                <option value="50">50 items / page</option>
                                                <option value="100">100 items / page</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @include('client-site.product._product-list')
                </div>

            </div>
        </div>
    </div>
</section>
@stop
