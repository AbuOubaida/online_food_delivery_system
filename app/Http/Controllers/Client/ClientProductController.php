<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($productID)
    {
        $headerData = ['app'=>'Online Food Delivery System','role'=>'Client','title'=>'Single Product View'];
        $pageInfo = ['rootRoute'=>'root','root'=>'Home','parent'=>'Shop','parentRoute'=>'client.product.list','this'=>'Single Product'];
        $product = Product::leftJoin('users as v','v.id','products.vendor_id')// v as for product vendor info from user
        ->leftJoin('users as c','c.id','products.creater_id')// c as product creater info from user
        ->leftJoin('users as up','up.id','products.updater_id')// up as product updater info from user
        ->leftJoin('categories as cate','cate.id','products.category_id')//cate as categories table
        ->select('v.name as vendor_name','c.name as creater_name','up.name as updater_name','cate.c_name as category_name','products.*')->where("products.p_status", 1)->where('products.id',$productID)->first();
        return view('client-site.view-single-product',compact('headerData','product','pageInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $headerData = ['app'=>'Online Food Delivery System','role'=>'Client','title'=>'Single Product View'];
        $pageInfo = ['rootRoute'=>'root','root'=>'Home','parent'=>null,'parentRoute'=>null,'this'=>'Shop'];

        $productLists = Product::leftJoin('users as v','v.id','products.vendor_id')// v as for product vendor info from user
        ->leftJoin('users as c','c.id','products.creater_id')// c as product creater info from user
        ->leftJoin('users as up','up.id','products.updater_id')// up as product updater info from user
        ->leftJoin('categories as cate','cate.id','products.category_id')//cate as categories table
        ->select('v.name as vendor_name','c.name as creater_name','up.name as updater_name','cate.c_name as category_name','products.*')
            ->where("products.p_status", 1)->where('p_image','!=',null)->orderBy("id", "DESC")->get();

        return view('client-site.product-list',compact('headerData','pageInfo','productLists'));
    }

    public function addToCart($product_id)
    {
        try {
            $product = Product::leftJoin('users as v','v.id','products.vendor_id')// v as for product vendor info from user
            ->leftJoin('users as c','c.id','products.creater_id')// c as product creater info from user
            ->leftJoin('users as up','up.id','products.updater_id')// up as product updater info from user
            ->leftJoin('categories as cate','cate.id','products.category_id')//cate as categories table
            ->select('v.name as vendor_name','c.name as creater_name','up.name as updater_name','cate.c_name as category_name','products.*')->where("products.p_status", 1)->where('products.id',$product_id)->first();

            $cart = session()->get('cart');
            if (!$cart)
            {
                $cart[$product_id] = [
                    'p_id' => $product->id,
                    'name' => $product->p_name,
                    'quantity' => 1,
                    'price' => $product->p_price,
                    'photo' => $product->p_image,
                    'category' => $product->category_name,
                    'vendor' => $product->vendor_name,
                ];
                session()->put('cart',$cart);
                return back()->with('success','Product added to cart successfully');
            }
            if (isset($cart[$product_id]))
            {
                $cart[$product_id]['quantity']++;
                session()->put('cart',$cart);
                return back()->with('success','Product added to cart successfully');
            }
            $cart[$product_id] = [
                'p_id' => $product->id,
                'name' => $product->p_name,
                'quantity' => 1,
                'price' => $product->p_price,
                'photo' => $product->p_image,
                'category' => $product->category_name,
                'vendor' => $product->vendor_name,
            ];
            session()->put('cart',$cart);
            return back()->with('success','Product added to cart successfully');

        }catch (\Throwable $exception)
        {
            return back();
        }


    }

    public function viewCart()
    {
        $headerData = ['app'=>'Online Food Delivery System','role'=>'Client','title'=>'Single Product View'];
        $pageInfo = ['rootRoute'=>'root','root'=>'Home','parent'=>'Shop','parentRoute'=>'client.product.list','this'=>'Shopping Cart'];
        return view('client-site.shop-cart',compact('headerData','pageInfo'));

    }

    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function deleteCart(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkOut(Request $request)
    {
        if ($request->isMethod('post'))
        {
            try {
                extract($request->post());
                $cID = Auth::user()->id;
                $orderID = rand(0, 99999);
                $cart = session()->get('cart');
                foreach(session('cart') as $id => $details)
                {
                    $product = product::where('id',$details['p_id'])->first();
                    order::create([
                        'order_id' => $orderID,
                        'customer_id' => $cID,
                        'products_id' => $product['id'],
                        'restaurant_id' => $product['vendor_id'],
                        'delivery_address' => $address,
                        'c_phone' => $phone,
                        'c_email' => $email,
                        'order_status' => 1,
                        'order_quantity' => $details['quantity'],
                        'price' => ($details['quantity'] * $details['price']),
                        'payment_method' => $payment,
                    ]);
                }
                session()->forget(['cart']);
                return redirect()->route('login')->with('success','Order successfully!');
            }catch (\Throwable $exception)
            {
                back();
            }

        }
        else{
            return redirect()->route('view.cart');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
