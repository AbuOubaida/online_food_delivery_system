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
}
