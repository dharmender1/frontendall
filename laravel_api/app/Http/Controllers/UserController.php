<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user || !HASH::check($request->password,$user->password)){
            return response([
                'error'=>["Email or Password not match!!"]
            ]);
        }
        return $user;
    }
}
