<header id="navbar-spy" class="header header-3 header-transparent header-bordered header-fixed">
    <nav id="primary-menu" class="navbar navbar-fixed-top">
        <div class="container">
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse-2">
                <ul class="nav navbar-nav nav-pos-right navbar-left">
                    <li class="active">
                        <a href="{{route("root")}}" class="menu-item">home</a>
                    </li>

                    <li class="">
                        <a href="contacts.html" class="menu-item">Contact Us</a>
                    </li>

                    <li class="">
                        <a href="about.html" class="menu-item">About</a>
                    </li>
                </ul>
            </div>

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-mobile" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="logo" href="{{route("root")}}">
                    <h2 class="logo-text">Online Food</h2>
{{--                    <img class="logo-light " src="{{url("client-site/images/logo/download-removebg-preview.png")}}" width="25%"/>--}}
{{--                    <img class="logo-dark" src="{{url("client-site/images/logo/download-removebg-preview.png")}}" alt="granny Logo" width="30%" />--}}
                </a>
            </div>
            <div class="module-container pull-right">

                <div class="module module-cart">
                    <div class="module-icon cart-icon">
                        <a href="{{route('view.cart')}}">
                            <i class="fa fa-shopping-cart"></i>
                            @if(session('cart'))
                                <label class="module-label">{{count(session('cart'))}}</label>
                            @endif
                        </a>

                    </div>
{{--                    <div class="module-content module-box cart-box">--}}
{{--                        <div class="cart-overview">--}}
{{--                            <ul class="list-unstyled">--}}
{{--                                <li>--}}
{{--                                    <img class="img-responsive" src="{{url("client-site/images/shop/thumb/6.jpg")}}" alt="product" />--}}
{{--                                    <div class="product-meta">--}}
{{--                                        <h5 class="product-title">Red Tape Shoes</h5>--}}
{{--                                        <p class="product-price">1 x $ 41.00</p>--}}
{{--                                    </div>--}}
{{--                                    <a class="cart-cancel" href="#">cancel</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <img class="img-responsive" src="{{url("client-site/images/shop/thumb/7.jpg")}}" alt="product" />--}}
{{--                                    <div class="product-meta">--}}
{{--                                        <h5 class="product-title">Brave Sweater</h5>--}}
{{--                                        <p class="product-price">1 x $ 32.00</p>--}}
{{--                                    </div>--}}
{{--                                    <a class="cart-cancel" href="#">cancel</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="cart-total">--}}
{{--                            <div class="total-desc">--}}
{{--                                Subtotal:--}}
{{--                            </div>--}}
{{--                            <div class="total-price">--}}
{{--                                $73.00--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="clearfix"></div>--}}
{{--                        <div class="cart--control">--}}
{{--                            <a class="btn btn--primary btn--block mb-10" href="shop-cart.html">view cart</a>--}}
{{--                            <a class="btn btn--white btn--bordered btn--block" href="shop-cart.html">Checkout</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

            </div>

            <div class="collapse navbar-collapse pull-right" id="navbar-collapse-1">
                <ul class="nav navbar-nav nav-pos-right navbar-left">
                    <li>
                        <a href="{{route('client.product.list')}}"  class="menu-item">shop</a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('login')}}">Login</a>
                    </li>

                    <li>
                        <a href="{{route('register')}}"  class="menu-item">Register</a>
                    </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse pull-right" id="navbar-collapse-mobile">
                <ul class="nav navbar-nav nav-pos-right navbar-left hidden-lg hidden-md">
                    <li class="has-dropdown mega-dropdown active">
                        <a href="#" class="menu-item">home</a>
                    </li>

                    <li class="has-dropdown">
                        <a href="contacts.html" class="menu-item">Contact Us</a>
                    </li>

                    <li class="has-dropdown">
                        <a href="about.html" class="menu-item">About</a>
                    </li>

                    <li>
                        <a class="menu-item" href="gallery.html">gallery</a>
                    </li>


                    <li class="has-dropdown">
                        <a href="shop-products.html" class="menu-item">shop</a>
                    </li>
                    <li>
                        <a class="menu-item" href="#">Login</a>
                    </li>

                    <li>
                        <a href="#"  class="menu-item">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
