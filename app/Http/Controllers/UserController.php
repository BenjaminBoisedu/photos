<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function login()
    {
        return view('/login-register/login');
    }

    function loginT()
    {
        $name = request('name');
        $password = request('password');
        $user = DB::table('users')->where('name', $name)->first();
        if ($user->password == sha1($password)) {
            $user =  Auth::loginUsingId($user->id);
            session(['user' => $user]);
            return redirect('/');
        } else {
            return redirect('/login', ['error' => 'Identifiants incorrects']);
        }
    }

    function register()
    {
        return view('/login-register/register');
    }

    function registerT()
    {
        $newUsers = new \App\Models\User;
        $newUsers->name = request('name');
        $newUsers->email = request('email');
        $newUsers->password = request('password');
        $newUsers->save();
        // Création d'une session
        session(['user' => $newUsers]);
        return redirect('/login');
    }
}
