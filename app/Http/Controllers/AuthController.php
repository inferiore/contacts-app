<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function showLogin()
    {

        return view('login.login');
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::route('auth.showLogin');
    }

    public function doLogin(Request $request)
    {


        $rules = array(
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );

            $data = $request->toArray();
			$validator = Validator::make($data , $rules);

			if ($validator->fails())
            {
                unset($data["password"]);
                return Redirect::to('login')->withErrors($validator)->withInput($data);
            }
            else
            {
                $userdata = array(
                    'email' => $data['email'] ,
                    'password' => $data["password"]
                );

                if (Auth::attempt($userdata))
                {
                    return redirect()->action([ContactsController::class, 'index']);
                }
                else
                {
                    return redirect()->action([AuthController::class, 'login']);;
                }
            }
    }
}
