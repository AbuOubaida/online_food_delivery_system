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
            $results = DB::table('divisions')->select('id','name')->get();
            echo json_encode(array(
                'results' => $results
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
