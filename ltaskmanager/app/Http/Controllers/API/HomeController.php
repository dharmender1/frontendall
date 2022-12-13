<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
//use Auth;
use Validator;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function login(Request $request) {
//echo $request->email;echo $request->password;die("14");
        $validator = Validator::make($request->all(), [ 
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $user = User::where('email' , $request->email)->where( 'password' , $request->password)->first();
        if($user){
                $token = $user->createToken('api_token')->plainTextToken;
                $user->api_token = $token;
                $user->remember_token = $token;
                $user->save();
                return response()->json(['status' => 'Authorised', 'token' => $token, 'userdetail' => $request->email ], 200);

        }else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }

        // $token = auth()->user()->createApiToken();
        // print_r($token);die;
        //  if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ die("24");
        //     $token = auth()->user()->createApiToken(); #Generate token
        //     return response()->json(['status' => 'Authorised', 'token' => $token ], 200);
        // } else { die("27");
        //     return response()->json(['status'=>'Unauthorised'], 401);
        // } 
    }

    public function index() {
        $users = User::latest()->paginate(10);

        if($users->count()) { 
            return response()->json(['status' => 'true' ,'data' => $users], 200);
        } else{ 
            return response()->json(['status' => 'false'], 401);
        }
    }
}
