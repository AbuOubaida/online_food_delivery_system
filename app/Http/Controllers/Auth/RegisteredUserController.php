<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countries = null;
        try {
            $countries = DB::table('countries')->distinct()->get();
            $roles = DB::table('roles')->where('id','>','2')->distinct()->get();
        }catch (\Throwable $exception)
        {
            return back()->with('error', $exception->getMessage());
        }
        return view('back-end.auth.register',compact('countries','roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'numeric', 'unique:'.User::class],
            'home'  => ['string','sometimes','nullable', 'max:255'],
            'village' => ['string','sometimes','nullable', 'max:255'],
            'word_no' => ['string','sometimes','nullable', 'max:255'],
            'union' => ['string','sometimes','nullable', 'max:255'],
            'upazila' => ['string','sometimes','nullable', 'max:255'],
            'district' => ['string','sometimes','nullable', 'max:255'],
            'zip_code' => ['string','sometimes','nullable', 'max:255'],
            'division' => ['string','sometimes','nullable', 'max:255'],
            'country' => ['string','sometimes','nullable', 'max:255'],
            'roles' => ['required','string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            extract($request->post());
            $user = User::create([
                'status' => 0,
                'fname' => $fname,
                'lname' => $lname,
                'name' => $fname.' '.$lname,
                'email' => $email,
                'phone' => $phone,
                'home' => $home,
                'village' => $village,
                'word' => $word_no,
                'union' => $union,
                'upazila' => $upazila,
                'district' => $district,
                'zip_code' => $zip_code,
                'division' => $division,
                'country' => $country,
                'password' => Hash::make($request->password),
            ]);
            if (DB::table('roles')->where('name',$roles)->first())
            {
                $user->attachRole($roles);
                event(new Registered($user));
                return back()->with('success','Account create successfully');
            }else{
                return back()->with('error','Invalid User Roles')->withInput();
            }

        }catch (\Throwable $exception)
        {
            return back()->with('error',$exception->getMessage())->withInput();
        }


//        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
