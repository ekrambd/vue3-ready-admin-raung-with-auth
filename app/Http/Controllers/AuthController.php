<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
    	if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
	        $user = Auth::user();
	        $success['token'] = $user->createToken('MyApp')->plainTextToken;
	        $success['id'] = $user->id;
	        $success['name'] = $user->name;
	        $success['email'] = $user->email;
	        return response()->json(['success' => true, 'message' => 'Successfully Logged In', 'data' => $success]);
	    }
	    return response()->json(['success' => false, 'message' => 'Email or Password Invalid', 'data' => ['token' => "", 'id' => 0, 'email' => ""]]);
    }

    public function logout(Request $request)
    {
    	auth()->user()->tokens()->delete();
        return response()->json(['success' => true, 'message' => 'successfully logged out!']);
    }
}
