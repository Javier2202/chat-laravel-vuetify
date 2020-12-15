<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUsuario;
use App\Http\Resources\UsuarioResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{
    public function login(LoginUsuario $request)
    {
        $remember = $request->has('remember_me') ? $request->boolean('remember_me') : false;

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials,$remember)) {
            $user = auth()->user();
            $success['token'] = $user->createToken('Chat Api')->accessToken;

            return response()->json($success, 200);
        } else {
            return response()->json(['errors' => ['password' => 'Contraseña invalida']], 401);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            auth()->user()->tokens->each(function($token,$key){
                $token->delete();
            });
            
            return response()->json([
                'message' => 'Logged Out'
            ]);
        }

        return response()->json([
            'error' => 'no estas loggeado',
        ]);
    }

    public function registro(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);


        if($validator->fails())
            return response()->json(['errors' => $validator->errors]);
        
        request()->merge(['password' => bcrypt(request('password'))]);
        
        $user = User::create(request()->input());
        
        $access_token = $user->createToken('Chat Api')->accessToken;

        return response()->json([
            'user' => UsuarioResource::make($user),
            'access_token' => $access_token,
        ]);
    }
}
