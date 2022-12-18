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
<section id="shopcart" class="shop shop-cart bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="cart-product">
                            <th class="cart-product-item">Product</th>
                            <th class="cart-product-price">Price</th>
                            <th class="cart-product-quantity">Quantity</th>
                            <th class="cart-product-total">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                @if(session('cart'))
                    @php($total = 0)
                    @foreach(session('cart') as $id => $details)
                            <?php
                            $total += $details['price'] * $details['quantity']
                            ?>
                            <tr class="cart-product">
                                <td class="cart-product-item" class="actions" data-th="">
                                    <button class="cart-product-remove" data-id="{{ $id }}">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    <div class="cart-product-img">
                                        <img width="20%" src="{{url("assets/back-end/vendor/product/").'/'.$details['photo']}}" alt="product" />
                                        <br>
                                        <small>Product by {{$details['vendor']}}</small>
                                    </div>
                                    <div class="cart-product-name">
                                        <h6>{{$details['name']}}</h6>

                                    </div>
                                </td>
                                <td class="cart-product-price" data-th="Price">BDT {{$details['price']}}</td>
                                <td class="cart-product-quantity">
                                    <div class="product-quantity" data-th="Quantity">
                                        <input width="100" type="number" value="{{ $details['quantity'] }}" class="quantity" id="pro1-qunt">
                                        <div class="col-xs-12 col-sm-6 col-md-6" data-th="">
                                            <button class="btn btn--secondary update-cart" data-id="{{ $id }}">update</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart-product-total"> BDT {{ $details['price'] * $details['quantity'] }}</td>
                            </tr>
                    @endforeach
                @endif
                        <tr class="cart-product-action">
                            <td colspan="4">
                                <div class="row clearfix">
                                    <div class="col-xs-12 col-sm-6 col-md-6">

                                    </div>

                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12  col-md-12">
                <div class="cart-total-amount">
                    <h6>Cart Totals :</h6>
                    <ul class="list-unstyled">
                        <li>Cart Subtotal :<span class="pull-right text-right">BDT {{$total}}</span></li>
                        <li>Shipping :<span class="pull-right text-right">Free Shipping</span></li>
                        <li>Order Total :<span class="pull-right text-right">BDT {{($total)}}</span></li>
                    </ul>
                    <div class="contact-form">
                        @if($user = \Illuminate\Support\Facades\Auth::user())
                            <form action="{{route("order.checkout")}}" method="post">
                                @csrf
                                <div class="row">
                                    <h4>Delivery Information</h4>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="customer_name" id="name" placeholder="Name:" required value="@isset($user->name) {{$user->name}} @endisset">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="address" id="last" placeholder="Address" required value="Heme: {{$user->home}}, village: {{$user->village}}, upazila: {{$user->upazila}}, district: {{$user->district}}, division: {{$user->division}}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="Email:" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}" placeholder="Phone:" required>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Please select your payment option</p>
                                        <input type="radio" id="bkash" name="payment" value="1">
                                        <label for="bkash">BKash</label><br>
                                        <input type="radio" id="cash" name="payment" value="2" checked>
                                        <label for="css">Cash</label><br>
                                        <input type="submit" value="Checkout" class="btn btn--primary">
                                    </div>
                                </div>
                            </form>
                        @else
                        <p>Please select your payment option</p>
                        <input type="radio" id="bkash" name="payment" value="1">
                        <label for="bkash">BKash</label><br>
                        <input type="radio" id="cash" name="payment" value="2" checked>
                        <label for="css">Cash</label><br>
                            <a href="{{route('order.checkout')}}" class="btn btn--primary">Checkout</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@stop
