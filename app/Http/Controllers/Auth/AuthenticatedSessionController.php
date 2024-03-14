<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Property;
use App\Models\Users;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        addJavascriptFile('assets/js/custom/authentication/sign-in/general.js');

        return view('pages/auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {


        $request->authenticate();

        $request->session()->regenerate();

        $user_id = $request->user()->user_id;

        $property_id = NULL;
       
        if (Users::where('user_id',$user_id)->first()->hasRole("Property Admin")) {
            if (Property::where('property_admin_id', $user_id)->get()->count() > 0) {
                $property_id = Property::where('property_admin_id', $user_id)->first()->property_id;
            }
        }
       



        $request->user()->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'property_id'=>$property_id,
            'last_login_ip' => $request->getClientIp()
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
