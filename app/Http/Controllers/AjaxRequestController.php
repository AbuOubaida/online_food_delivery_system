<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxRequestController extends Controller
{
    public function __construct()
    {
        header('Content-Type: application/json');
    }

    public function getDivision(Request $request)
    {
        try {
            extract($request->post());
            if (isset($value) && (strtolower($value) == strtolower("Bangladesh")))
            {
                $results = DB::table('divisions')->select('id','name')->get();
                echo json_encode(array(
                    'results' => $results
                ));
            }
        }catch (\Throwable $exception)
        {
            echo json_encode(array(
                'error' => array(
                    'msg' => $exception->getMessage(),
                    'code' => $exception->getCode(),
                )
            ));
        }
    }
    public function getDistrict(Request $request)
    {
        try {
            extract($request->post());
            $division = DB::table('divisions')->where('name',$value)->select('id')->first();
//            echo $division->id;
            $districts = DB::table('districts')->where('division_id',$division->id)->select('name','bn_name')->get();
            echo json_encode(array(
                'results' => $districts
            ));
        }catch (\Throwable $exception)
        {
            echo json_encode(array(
                'error' => array(
                    'msg' => $exception->getMessage(),
                    'code' => $exception->getCode(),
                )
            ));
        }
    }
    public function getUpazila(Request $request)
    {
        try {
            extract($request->post());
            $district = DB::table('districts')->where('name',$value)->select('id')->first();
//            echo $division->id;
            $upazilas = DB::table('upazilas')->where('district_id',$district->id)->select('name','bn_name')->get();
            echo json_encode(array(
                'results' => $upazilas
            ));
        }catch (\Throwable $exception)
        {
            echo json_encode(array(
                'error' => array(
                    'msg' => $exception->getMessage(),
                    'code' => $exception->getCode(),
                )
            ));
        }
    }
}
