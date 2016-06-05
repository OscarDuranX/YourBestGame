<?php

namespace App\Http\Controllers;

use App\Joc;
use App\Transformers\GameTransformer;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

class UserJocController extends Controller
{

    public function __construct(GameTransformer $gameTransformer)
    {
//        $this->middleware('auth.basic',['only'=>['store','update','destroy']]);
        //TODO Descomentar permis d'usuari per accedir als metodes POST!
        $this->gameTransformer = $gameTransformer;
    }

    public function index(Request $request)
    {
        //$iduser=Auth::user()->id;

        $selectUser = DB::table('users')->where('api_token', $request->api_token)->first();

        //dd(Auth::user());
        $user=User::find($selectUser->id);

        if (! $user)
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un user con ese código.'])],404);
        }

        return response()->json(['status'=>'ok','data'=>$this->gameTransformer->transformCollection($user->jocs()->get())],200);
        //return response()->json(['status'=>'ok','data'=>$fabricante->aviones],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //return $request->api_token;
        //Busquem Usuari amb el Api_Token
        $selectUser = DB::table('users')->where('api_token', $request->api_token)->first();

//        return $selectUser;
        // Primero comprobaremos si estamos recibiendo todos los campos.
        if (!$request->input('nom') || !$request->input('imagen') || !$request->input('URLGame') || !$request->input('categoria'))
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 422 Unprocessable Entity – [Entidad improcesable] Utilizada para errores de validación.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos necesarios para el proceso de alta.'])],422);
        }

       //Cerquem l'usuari
        $user=User::find($selectUser->id);
//
        if (!$user)
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra el usuario con ese código.'])],404);
        }
        //Creem el nou joc amb les dades entrades a traves del usuari
        $nuevoJuego=$user->jocs()->create($request->all());

        //Enviem la resposta per a comprovar que tot hagi anat bé
        $response = Response::make(json_encode(['data'=>$nuevoJuego]), 201)->header('Location', 'http://localhost:8000/joc/'.$nuevoJuego->id)->header('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {


    }

    public function update(Request $request, $idjoc)
    {
        // Comprobamos si el fabricante que nos están pasando existe o no.
        //dd($idjoc);

        //TODO methode update provisional, arreglar iduser per comprovar que estigue logejat
        //$iduser=Auth::user()->id;



        $user=User::find(2);

        //dd($user);

        $joc=$user->jocs()->find($idjoc);

        dd($joc);

        //$joc=Joc::find($id);

        // Si no existe ese fabricante devolvemos un error.
        if (!$joc)
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un juego con ese codigo.'])],404);
        }

        // Listado de campos recibidos teóricamente.
        $nombre=$request->input('nom');
        $imatge=$request->input('imatge');
        $URL=$request->input('URL');
        $categoria=$request->input('categoria');


        // Necesitamos detectar si estamos recibiendo una petición PUT o PATCH.
        // El método de la petición se sabe a través de $request->method();
        if ($request->method() === 'PATCH')
        {
            // Creamos una bandera para controlar si se ha modificado algún dato en el método PATCH.
            $flag = false;

            // Actualización parcial de campos.
            if ($nombre)
            {
                $joc->nom = $nombre;
                $flag=true;
            }

            if ($imatge)
            {
                $joc->imatge = $imatge;
                $flag=true;
            }


            if ($URL)
            {
                $joc->URL = $URL;
                $flag=true;
            }


            if ($categoria)
            {
                $joc->categoria = $categoria;
                $flag=true;
            }

            if ($flag)
            {
                // Almacenamos en la base de datos el registro.
                $joc->save();
                return response()->json(['status'=>'ok','data'=>$joc], 200);
            }
            else
            {
                // Se devuelve un array errors con los errores encontrados y cabecera HTTP 304 Not Modified – [No Modificada] Usado cuando el cacheo de encabezados HTTP está activo
                // Este código 304 no devuelve ningún body, así que si quisiéramos que se mostrara el mensaje usaríamos un código 200 en su lugar.
                return response()->json(['errors'=>array(['code'=>304,'message'=>'No se ha modificado ningún dato de joc.'])],304);
            }
        }


        // Si el método no es PATCH entonces es PUT y tendremos que actualizar todos los datos.
        if (!$nombre || !$imatge || !$URL || !$categoria)
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 422 Unprocessable Entity – [Entidad improcesable] Utilizada para errores de validación.
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan valores para completar el procesamiento.'])],422);
        }

        $joc->nom = $nombre;
        $joc->imatge = $imatge;
        $joc->URL = $URL;
        $joc->categoria = $categoria;

        // Almacenamos en la base de datos el registro.
        $joc->save();
        return response()->json(['status'=>'ok','data'=>$joc], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($idJoc)
    {
        //$iduser=Auth::user()->id;
        $user=User::find(2);

        //Todo Arreglar per comprovar usuari logejat, llevar comentat

        //dd($user);


        // Si no existe ese usuario devolvemos un error.
        if (!$user)
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un usuario con ese código.'])],404);
        }

        // El usuario existe entonces buscamos el juego que queremos borrar asociado a ese usuario.

        //dd($idJoc);
        $joc = $user->jocs()->find($idJoc);
        //$joc=Joc::all();
        //dd($joc);

        // Si no existe ese juego devolvemos un error.
        if (!$joc)
        {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            // En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un juego con ese código asociado a ese fabricante.'])],404);
        }

        // Procedemos por lo tanto a eliminar el juego.
        $joc->delete();

        // Se usa el código 204 No Content – [Sin Contenido] Respuesta a una petición exitosa que no devuelve un body (como una petición DELETE)
        // Este código 204 no devuelve body así que si queremos que se vea el mensaje tendríamos que usar un código de respuesta HTTP 200.
        return response()->json(['code'=>204,'message'=>'Se ha eliminado el juego correctamente.'],204);
    }
}
