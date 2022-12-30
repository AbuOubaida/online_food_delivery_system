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
<section id="contact1" class="contact contact-1">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="contact--desc">
                                <p>Granny was the first retaurant to open in Egypt, the resturant was designed with the history in mind we have created a soft industrial dining room, combined with an open kitchen, coffee take out bar and on site coffee roastery.</p>
                            </div>
                            <div class="row mb-30">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="contact--info">
                                        <h3>Our Address</h3>
                                        <p>Alnahas Building, 2 AlBahr St, Tanta</p>
                                        <p>AlGharbia, Egypt.</p>
                                        <a class="link--styled" href="#">Get Directions</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="contact--info">
                                        <h3>Our Phone</h3>
                                        <p>Office Telephone : 002 01065370701</p>
                                        <p>Mobile : 002 01065370701</p>
                                        <a class="link--styled" href="#">Call Us</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="contact--info">
                                        <h3>Our Email</h3>
                                        <p>Main Email : <a href="https://demo.zytheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="74431b061b1b1234431b061b1b125a171b19">[email&#160;protected]</a></p>
                                        <p>Inquiries : <a href="https://demo.zytheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ce87a0a8a18ef9a1bca1a1a8e0ada1a3">[email&#160;protected]</a></p>
                                        <a class="link--styled" href="#">Send a Message</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="contact--info">
                                        <h3>Follow Us</h3>
                                        <div class="social-icons">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="contact-form">
                                <form method="post" action="https://demo.zytheme.com/granny/assets/php/contact.php" class="contactForm mb-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="contact-name" id="name" placeholder="First Name:" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="contact-last" id="last" placeholder="Last Name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="contact-email" id="email" placeholder="Email:" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="contact-phone" id="phone" placeholder="Phone:" required>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="contact-message" id="message" rows="2" placeholder="Message" required></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" value="Send Message" name="submit" class="btn btn--secondary btn--block mt-10">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="contact-result"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
