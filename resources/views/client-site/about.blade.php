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
<section id="banner5" class="banner banner-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                <div class="heading heading-1 text--center mb-40">
                    <p class="heading--subtitle">Hello dear</p>
                    <h2 class="heading--title">Welcome To Online Food Delivery System</h2>
                    <div class="divider--shape-4"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                <div class="banner--desc">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque cum cumque inventore minus molestias officia quisquam quos rem tenetur veritatis. Adipisci beatae dolorem esse impedit labore quia rem tenetur totam. Accusamus architecto beatae, deleniti distinctio eius exercitationem illo, illum iste magni nobis perspiciatis quaerat recusandae vitae? Commodi id iste officiis vel.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="history-panel">
                    <h6>1995</h6>
                    <h3>Grand Opening</h3>
                    <div class="divider--shape-13"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consequatur eligendi eos fuga nihil quae sint tempore! Cumque error ex explicabo iure nemo odio temporibus. Necessitatibus quos similique voluptatum? Amet architecto aut beatae consequatur dolorum ea exercitationem fugit, harum iure nam natus obcaecati pariatur qui sapiente soluta temporibus veritatis. Iusto.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="history-panel">
                    <h6>2005</h6>
                    <h3>Second Branch</h3>
                    <div class="divider--shape-13"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias at autem dolorem expedita nobis placeat rem repudiandae, sed totam veritatis?</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="history-panel">
                    <h6>2015</h6>
                    <h3>Great Taste Award</h3>
                    <div class="divider--shape-13"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aut doloribus eos illo labore nisi odio perspiciatis qui, ratione voluptatibus!</p>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
