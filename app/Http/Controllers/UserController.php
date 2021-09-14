<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class UserController extends Controller
{
    public static function login(Request $request)
    {
        $user = User::where('username', '=', $request->username)->get();

        if(count($user) == 0)
        {
            return "{\"success\": false}";
        }

        if ($user[0]->password != $request->password)
        {
            return "{\"success\": false}";
        }
        
        return "{\"success\": true}";
    }

    public static function register(Request $request)
    {
        $user = User::where('username', '=', $request->username)->get();

        if(count($user) > 0)
        {
            return "{\"success\": false}";
        }

        User::create([
            'username' => $request->username,
            'password' => $request->password
        ]);

        return "{\"success\": true}";
    }
 
    public static function changePassword(Request $request)
    {
        $user = User::where('username', '=', $request->username)->get();

        if(count($user) == 0)
        {
            return "{\"success\": false}";
        }

        $user[0]->password = $request->password;
        $user[0]->save();

        return "{\"success\": true}";
    }
}
