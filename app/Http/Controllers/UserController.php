<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * display login form
     */
    public function loginForm()
    {
        return view('pages.login.login');
    }

    /**
     * valid user
     */
    public function loginSubmit(Request $request)
    {
        $mail = $request->mail;
        $password = md5($request->password);
        $isValid = false;

        $users = DB::table('users')->where([
            ['mail', '=', $mail],
            ['password', '=', $password]
        ])->get();

        if (sizeof($users)) {
            $isValid = true;
            $request->session()->put('isLogged', true);
        }

        if ($request->session()->get('isLogged')) {
            return view('pages.home.home');
        } else {
            return response()->json([
                'mail' => $mail,
                'password' => $password,
                'isValid' => $isValid
            ]);
        }
    }
}
