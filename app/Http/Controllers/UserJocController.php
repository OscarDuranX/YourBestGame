<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserJocController extends Controller
{

    public function __construct()
    {
//               $this->middleware('auth');
        //TODO Descomentar permis d'usuari per accedir als metodes POST!
    }

    public function index()
    {


        $iduser=Auth::user()->id;

        $user=User::find($iduser);

        if (! $user)
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un user con ese código.'])],404);
        }

        return response()->json(['status'=>'ok','data'=>$user->jocs()->get()],200);
        //return response()->json(['status'=>'ok','data'=>$fabricante->aviones],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($idFabricante)
    {
        //
        return "Se muestra formulario para crear un avión del fabricante $idFabricante.";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $requests)
    {

        $nomprova = $requests->input('Prova');
        dd($nomprova);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($idFabricante,$idAvion)
    {
        //
        return "Se muestra avión $idAvion del fabricante $idFabricante";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($idFabricante,$idAvion)
    {
        //
        return "Se muestra formulario para editar el avión $idAvion del fabricante $idFabricante";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($idFabricante,$idAvion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($idFabricante,$idAvion)
    {
        //
    }
}
