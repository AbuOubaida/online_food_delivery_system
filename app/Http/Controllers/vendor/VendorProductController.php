<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\user;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }

    // Product Category Start here
    public function createCategory(Request $request)
    {
        $headerData = ['app'=>'Online Food Delivery System','role'=>'vendor','title'=>'Add Product Category'];
        if ($request->isMethod('post'))
        {
            return $this->storeCategory($request);
        }else{
            return view('back-end.vendor.category.add-new',compact('headerData'));
        }
    }

    public function storeCategory(Request $request)
    {
        $auth = Auth::user();
        $request->validate([
            'cname' => ['required', 'string', 'max:255'],
            'cdescription' => ['string','sometimes','nullable'],
        ]);
        try {
            extract($request->post());
            if (category::where('c_name',$cname)->first())
            {
                return back()->with('warning','Category Name already exist in database')->withInput();
            }
            category::create([
                'vendor_id' => $auth->id,
                'creater_id' => $auth->id,
                'status' => 1,
                'c_name' => $cname,
                'c_description' => $cdescription,
            ]);
            return back()->with('success','Data save successfully');
        }catch (\Throwable $exception)
        {
            return back()->with('error',$exception->getMessage())->withInput();
        }
    }

    public function showCategory()
    {
        $headerData = ['app'=>'Online Food Delivery System','role'=>'vendor','title'=>'Product Category List'];
        $categories = category::leftJoin('users as v','v.id','categories.vendor_id')->leftJoin('users as c','c.id','categories.creater_id')->select('v.name as vendor_name','c.name as creater_name','categories.*')->where('categories.vendor_id',Auth::user()->id)->orderBY('categories.id','desc')->get();// v as vendor and c as creater

        return \view('back-end.vendor.category.show-list',compact('headerData','categories'));
    }

    public function viewCategory($categoryID)
    {
        try {
            $headerData = ['app'=>'Online Food Delivery System','role'=>'vendor','title'=>'Product Category List'];
            $category = category::leftJoin('users as v','v.id','categories.vendor_id')->leftJoin('users as c','c.id','categories.creater_id')->select('categories.id','categories.c_name as category_name','categories.c_description as category_description','v.name as vendor_name','c.name as creater_name')->where('categories.vendor_id',Auth::user()->id)->where('categories.id',$categoryID)->first();// v as vendor and c as creater
            return \view('back-end.vendor.category.view',compact('headerData','category'));
        }catch (\Throwable $exception)
        {
            return back()->with('error',$exception->getMessage())->withInput();
        }
    }

    public function editCategory(Request $request,$categoryID)
    {
        if ($request->isMethod('post'))
        {
            return $this->updateCategory($request);
        }else{
            try {
                $headerData = ['app'=>'Online Food Delivery System','role'=>'vendor','title'=>'Product Category List'];
                $category = category::leftJoin('users as v','v.id','categories.vendor_id')->leftJoin('users as c','c.id','categories.creater_id')->select('categories.id','categories.c_name as category_name','categories.c_description as category_description','categories.status')->where('categories.vendor_id',Auth::user()->id)->where('categories.id',$categoryID)->first();// v as vendor and c as creater
                return \view('back-end.vendor.category.edit',compact('headerData','category'));
            }catch (\Throwable $exception)
            {
                return back()->with('error',$exception->getMessage())->withInput();
            }
        }
    }

    public function updateCategory(Request $request)
    {
        $auth = Auth::user();
        $request->validate([
            'cname' => ['required', 'string', 'max:255'],
            'status' => ['required','numeric'],
            'cdescription' => ['string','sometimes','nullable'],
        ]);
        try {
            extract($request->post());
            if (!($status == 0 || $status == 1))
            {
                return back()->with('error','Invalid status value')->withInput();
            }
            if (category::where('id','!=',$category_id)->where('c_name',$cname)->first())
            {
                return back()->with('warning','Category Name already exist in database')->withInput();
            }
            category::where('id',$category_id)->where('vendor_id',Auth::user()->id)->update([

                'status' => $status,
                'c_name' => $cname,
                'c_description' => $cdescription,
            ]);
            return back()->with('success','Data Update successfully');
        }catch (\Throwable $exception)
        {
            return back()->with('error',$exception->getMessage())->withInput();
        }
    }

    public function destroyCategory(Request $request)
    {
        extract($request->post());
        $id = $category_id;
        if (category::where('id',$id)->where('vendor_id',Auth::user()->id)->delete())
            return back()->with('success','Data delete Successfully!');
        else
            return back()->with('error','Data delete not possible');
    }
}
