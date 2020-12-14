<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ConversacionCollection;
use App\Http\Resources\ConversacionResource;
use App\Http\Resources\UsuarioResource;
use App\Models\Conversacion;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ConversacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return ConversacionCollection::make($request->user()->conversaciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conversacion  $conversacion
     * @return \Illuminate\Http\Response
     */
    public function show(Conversacion $conversacion)
    {
        return ConversacionResource::make(Conversacion::findOrFail($conversacion->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conversacion  $conversacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversacion $conversacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conversacion  $conversacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversacion $conversacion)
    {
        //
    }
}
