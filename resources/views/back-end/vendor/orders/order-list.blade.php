@extends('back-end.vendor.main')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{$headerData['title']}}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{$headerData['title']}}</li>
            </ol>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card border-0 rounded-lg">
                        <div class="card-body">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    {{$headerData['title']}}
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>order id</th>
                                            <th>product</th>
                                            <th>customer name</th>
                                            <th>order quantity</th>
                                            <th>price</th>
                                            <th>phone</th>
                                            <th>email</th>
                                            <th>address</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>no</th>
                                            <th>order id</th>
                                            <th>product</th>
                                            <th>customer</th>
                                            <th>quantity</th>
                                            <th>price</th>
                                            <th>phone</th>
                                            <th>email</th>
                                            <th>address</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @if(count(@$orders) > 0)
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach($orders as $o)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$o->order_id}}</td>
                                                    <td><img src="{{url('assets/back-end/vendor/product/').'/'.$o->image}}" alt="product Image" width="10%" class="tabel-image"> {{$o->product}}</td>
                                                    <td class="text-capitalize"> {{$o->customer_name}}</td>
                                                    <td>{{$o->order_quantity}}</td>
                                                    <td>BDT {{$o->price}}</td>
                                                    <td>BDT {{$o->c_phone}}</td>
                                                    <td>BDT {{$o->c_email}}</td>
                                                    <td>BDT {{$o->delivery_address}}</td>
                                                    @if($o->order_complete_status == 0)
                                                    <td>
                                                        <a href="{{route('order.delivery',['oID'=>$o->id])}}" class="text-success"> Delivery</a>
                                                        <form action="{{route('vendor.delete.product')}}" method="post" class="d-inline-block">
                                                            {!! method_field('delete') !!}
                                                            {!! csrf_field() !!}
                                                            <input type="hidden" name="category_id" value="{{$o->id}}">
                                                            <button class="btn-style-none d-inline-block text-danger" onclick="return confirm('Are you sure delete this Apply Category?')" type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
