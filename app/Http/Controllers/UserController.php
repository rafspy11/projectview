<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * show all projects
     */
    public function homepage() {
        $projects = DB::table('projects')
        ->get();

        return view('pages.home.home', ['projects' => $projects]);
    }
    
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

        $users = DB::table('users')->where([
            ['mail', '=', $mail],
            ['password', '=', $password]
        ])->get();

        if (sizeof($users)) {
            $request->session()->put('isLogged', true);
            foreach($users as $user) {
                $request->session()->put('loggedId', $user->id);
                $request->session()->put('loggedMail', $user->mail);
            }
        }

        return response()->json([
            'mail' => $mail,
            'password' => $password,
            'isLogged' => $request->session()->get('isLogged'),
            'loggedMail' => $request->session()->get('loggedMail')
        ]);
    }

    /**
     * logout
     */
    public function logout(Request $request) {
        $request->session()->put('isLogged', false);
        $request->session()->forget('loggedId');
        $request->session()->forget('loggedMail');

        return redirect()->route('home');
    }

    /**
     * add Project
     */
    public function addProject() {
        return view('pages.projects.project-add');
    }

    /**
     * insert project to db
     */
    public function insertProject(Request $request) {
        DB::table('projects')->insert(
            ['name' => $request->name, 'user_id' => $request->session()->get('loggedId'), 'state' => 'open']
        );

        return redirect()->route('home');
    }

}
