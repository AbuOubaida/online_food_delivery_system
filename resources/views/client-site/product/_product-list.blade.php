@if(isset($productLists) && count($productLists)>0)
    @foreach($productLists as $pl)
        <div class="col-xs-12 col-sm-6 col-md-3 productFilter filter-{{$pl->category_name}}">
            <div class="product-item">
                <div class="product--img">
                    <img class="product-img-list" src="{{url("assets/back-end/vendor/product/").'/'.$pl->p_image}}" alt="Product"/>
                    <div class="product--hover">
                        <div class="product--action">
                            <a href="{{route('name.add.to.cart',['PID'=>$pl->id])}}">Add To Cart</a>
                        </div>
                    </div>

                    <div class="divider--shape-1down"></div>
                </div>

                <div class="product--content">
                    <div class="product--type"><span>{{$pl->category_name}}</span></div>
                    <div class="product--title">
                        <h3><a href="#">{{$pl->p_name}}</a></h3>
                    </div>
                    <div class="product--type"><span>{{ \Illuminate\Support\Str::limit($pl->p_details, $limit = 40, $end = '...')}}</span></div>

                    <div class="product--price">
                        <span>BDT {{$pl->p_price}}/=</span>
                    </div>
                    <br>
                    <div class="product--action">
                        <a href="{{route('client.single.product.view',['productSingleID'=>$pl->id])}}" class="view-product-btn">View Product</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
