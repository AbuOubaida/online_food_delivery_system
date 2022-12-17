<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = null;
        $headerData = ['app'=>'Online Food Delivery System','role'=>'Client','title'=>'Home Page'];
        try {
            $categories = category::where('status',1)->orderBy("id", "DESC")->take(10)->get();// Select * from categories where 'status=1 order by 'desc'
            $products = Product::leftJoin('users as v','v.id','products.vendor_id')// v as for product vendor info from user table
            ->leftJoin('users as c','c.id','products.creater_id')// c as product creater info from user
            ->leftJoin('users as up','up.id','products.updater_id')// up as product updater info from user
            ->leftJoin('categories as cate','cate.id','products.category_id')//cate as categories table
            ->select('v.name as vendor_name','c.name as creater_name','up.name as updater_name','cate.c_name as category_name','products.*')
                ->where("products.p_status", 1)->where('p_image','!=',null)->orderBy("id", "DESC")->take(8)->get();
            $productLists = Product::leftJoin('users as v','v.id','products.vendor_id')// v as for product vendor info from user
            ->leftJoin('users as c','c.id','products.creater_id')// c as product creater info from user
            ->leftJoin('users as up','up.id','products.updater_id')// up as product updater info from user
            ->leftJoin('categories as cate','cate.id','products.category_id')//cate as categories table
            ->select('v.name as vendor_name','c.name as creater_name','up.name as updater_name','cate.c_name as category_name','products.*')
                ->where("products.p_status", 1)->where('p_image','!=',null)->orderBy("id", "ASC")->take(4)->get();

            return view('client-site.home',compact('categories','headerData','products','productLists'));

        }catch (\Throwable $exception)
        {
            return redirect()->route('login');
        }

    }
}
