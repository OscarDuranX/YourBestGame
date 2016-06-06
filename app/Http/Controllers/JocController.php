<?php

namespace App\Http\Controllers;

use App\Joc;
use App\Transformers\GameTransformer;
use Illuminate\Http\Request;
use App\Http\Requests;

class JocController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param GameTransformer $gameTransformer
     */

    public function __construct(GameTransformer $gameTransformer)
    {
        $this->gameTransformer = $gameTransformer;
    }

    public function index()
    {


        // Devolverá todos los fabricantes.
        $game = Joc::all();

        //dd($game);

//        return response()->json(['status'=>'ok','data'=>$game->all()], 200);


        return $this->respond($this->gameTransformer->transformCollection($game->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return "Se muestra formulario para crear un fabricante.";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        // return "Se muestra Fabricante con id: $id";
        // Buscamos un fabricante por el id.
        $joc=Joc::find($id);

        // Si no existe ese fabricante devolvemos un error.
        if (!$joc)
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un juego con ese código.'])],404);
        }

        return response()->json(['status'=>'ok','data'=>$joc],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        return "Se muestra formulario para editar Fabricante con id: $id";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
