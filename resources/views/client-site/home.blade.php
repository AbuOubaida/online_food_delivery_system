@extends('client-site.main')
@section('content')
<x-client._home_slider /> {{--<header slider section>--}}

<section id="shop2" class="shop shop-4 bg-white pt-0">
    <div class="container">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <div class="heading heading-3 mb-30 mt-10 text--center">
                    <p class="heading--subtitle">Discover</p>
                    <h2 class="heading--title mb-0">Latest Dishes</h2>
                    <div class="divider--shape-4"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 shop-filter">
                <ul class="list-inline">
                    <li><a class="active-filter" href="#" data-filter="*">All</a></li>
                    @if(isset($categories) && count($categories) > 0)
                        @foreach($categories as $category)
                            <li><a href="#" data-filter=".filter-{{$category->c_name}}">{{$category->c_name}}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <div id="shop-all" class="row">
    @if(isset($products) && count($products)>0)
        @foreach($products as $p)
            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-{{$p->category_name}}">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("assets/back-end/vendor/product/").'/'.$p->p_image}}" alt="Product"/>
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>{{$p->category_name}}</span></div>
                        <div class="product--title">
                            <h3><a href="#">{{$p->p_name}}</a></h3>
                        </div>
                        <div class="product--type"><span>{{ \Illuminate\Support\Str::limit($p->p_details, $limit = 40, $end = '...')}}</span></div>

                        <div class="product--price">
                            <span>BDT {{$p->p_price}}/=</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-desserts filter-soup">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/1.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Light</span> - <span>Mexican</span> - <span>Organic</span></div>
                        <div class="product--title">
                            <h3><a href="#">Grilled American Fillet</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$24.95</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-drinks">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/2.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Low Carb</span> - <span>Fresh</span></div>
                        <div class="product--title">
                            <h3><a href="#">Roast Sea Trout</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$38.95</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-desserts">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/3.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Nut Free</span> - <span>Sweet</span> - <span>Fresh</span></div>
                        <div class="product--title">
                            <h3><a href="#">Grilled Seafood Paella</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$34.95</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-main">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/4.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Grilled</span> - <span>Fresh</span></div>
                        <div class="product--title">
                            <h3><a href="#">Chicken Breast</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$29.95</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-salads">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/5.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Sweet</span> - <span>Nut Free</span></div>
                        <div class="product--title">
                            <h3><a href="#">Roast Sea Trout</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$13.95</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 productFilter">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/6.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Light</span> - <span>Mexican</span> - <span>Organic</span></div>
                        <div class="product--title">
                            <h3><a href="#">Grilled American Fillet</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$13.95</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-drinks">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/7.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Sweet</span> - <span>Fresh</span></div>
                        <div class="product--title">
                            <h3><a href="#">Cannoli Cream Cheese</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$24.95</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-main">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/8.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Fresh</span> - <span>Light</span></div>
                        <div class="product--title">
                            <h3><a href="#">Spain Tapas</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$23.95</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="counter1" class="counter counter-1 bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{url("client-site//images/counter/1.jpg")}}" alt="Background" />
    </div>
    <div class="divider--shape-1up"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="count-box text-center">
                    <div class="counting">15423</div>
                    <div class="count-title">Clients Served</div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="count-box text-center">
                    <div class="counting">165</div>
                    <div class="count-title">Dishes in Menu</div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="count-box text-center">
                    <div class="counting">59</div>
                    <div class="count-title">Working Hands</div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="count-box text-center">
                    <div class="counting">286</div>
                    <div class="count-title">Positive Reviews</div>
                </div>
            </div>
        </div>

        <div class="divider--shape-1down"></div>
    </div>
</section>

<section id="shop" class="shop shop-4 bg-white">
    <div class="container">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <div class="heading heading-3 mb-30 text--center">
                    <p class="heading--subtitle">Don’t miss</p>
                    <h2 class="heading--title mb-0">Popular Dishes</h2>
                    <div class="divider--shape-4"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-salads">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/9.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Nut Free</span> - <span>Sweet</span> - <span>Fresh</span></div>
                        <div class="product--title">
                            <h3><a href="#">Grilled Seafood Paella</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$34.95</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-main">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/10.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Sweet</span> - <span>Fresh</span></div>
                        <div class="product--title">
                            <h3><a href="#">Cannoli Cream Cheese</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$34.95</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-main">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/11.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Nut Free</span> - <span>Sweet</span> - <span>Fresh</span></div>
                        <div class="product--title">
                            <h3><a href="#">Grilled American Fillet</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$54.95</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-main">
                <div class="product-item">
                    <div class="product--img">
                        <img src="{{url("client-site//images/shop/grid/12.jpg")}}" alt="Product" />
                        <div class="product--hover">
                            <div class="product--action">
                                <a href="#">Add To Cart</a>
                            </div>
                        </div>

                        <div class="divider--shape-1down"></div>
                    </div>

                    <div class="product--content">
                        <div class="product--type"><span>Nut Free</span> - <span>Fresh</span></div>
                        <div class="product--title">
                            <h3><a href="#">Roasted Steak Roulade</a></h3>
                        </div>

                        <div class="product--price">
                            <span>$14.95</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
