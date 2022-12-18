<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function newOrder ()
    {
        $headerData = ['app'=>'Online Food Delivery System','role'=>'restaurant','title'=>'New Order List'];
        $me = Auth::user();
        $orders = order::leftJoin('users as u','u.id','orders.customer_id')
            ->leftJoin('products as p','p.id','orders.products_id')
            ->select('u.name as customer_name','p.p_name as product','p.p_image as image','orders.*')
            ->where('orders.order_complete_status','0')->where('orders.restaurant_id',$me->id)->get();
        return view('back-end.vendor.orders.order-list',compact('headerData','orders'));
    }
    public function delOrder ()
    {
        $headerData = ['app'=>'Online Food Delivery System','role'=>'restaurant','title'=>'New Order List'];
        $me = Auth::user();
        $orders = order::leftJoin('users as u','u.id','orders.customer_id')
            ->leftJoin('products as p','p.id','orders.products_id')
            ->select('u.name as customer_name','p.p_name as product','p.p_image as image','orders.*')
            ->where('orders.order_complete_status','1')->where('orders.restaurant_id',$me->id)->get();
        return view('back-end.vendor.orders.order-list',compact('headerData','orders'));
    }

    public function orderDelivery($oID)
    {
        $headerData = ['app'=>'Online Food Delivery System','role'=>'restaurant','title'=>'New Order Delivery'];
        $order = order::where('id',$oID)->first();
        $deliveryPerson = User::leftJoin('role_user as ru','ru.user_id','users.id')->where('ru.role_id','4')->select('users.name as delivery_p_n','users.id as user_id')->get();
        return view('back-end.vendor.orders.delivery',compact('deliveryPerson','order','headerData'));
    }

    public function updateOrderDelivery (Request $request)
    {
        try {
            extract($request->post());
            order::where('id',$oid)->update([
                'delivery_person_id' => $del,
                'order_complete_status' => 1,
            ]);
            return redirect()->route('new.order.list')->with('success','Order Delivered Successfully');
        }catch (\Throwable $exception)
        {
            return back();
        }
    }
}
