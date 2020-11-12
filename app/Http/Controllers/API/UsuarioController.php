<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsuario;
use App\Http\Resources\UsuarioResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuario $request)
    {
        //request()->merge(['password' => bcrypt(request('password'))]);
        
        $datosValidados = $request->validated();

        //Storage::disk('local')->put($request->file('imagen')->, 'Contents');

        //Storage::putFileAs('photos', new File('/path/to/photo'), 'photo.jpg');

        $url = $request->file('imagen')->storeAs('imagenes/perfil', $request->file('imagen')->getClientOriginalName());

        return $url;

        $user = User::create(request()->input());
        
        $access_token = $user->createToken('Chat Api')->accessToken;

        return response()->json([
            'user' => UsuarioResource::make($user),
            'access_token' => $access_token,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        return UsuarioResource::make(User::findOrFail($user_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
