<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class routeController extends Controller
{
    public function index()
    {

        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            return redirect('admin/dashboard');
        } elseif (Auth::user()->hasRole('user')) {
            return redirect('user/dashboard');
        } elseif (Auth::user()->hasRole('vendor')) {
            return redirect('vendor/dashboard');
        }elseif (Auth::user()->hasRole('delivery_person')) {
            return redirect('delivery_person/dashboard');
        }
        return view('/');
    }
}
