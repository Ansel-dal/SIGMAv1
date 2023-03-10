<?php

namespace App\Http\Controllers;

use App\Models\Itemsgroup;
use Illuminate\Http\Request;

class ItemsgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $datos['groups'] = Itemsgroup::where('Identificador', '=', 'A')->paginate(20);
        return view('titulo1.deposito.grupos.index', $datos);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('titulo1.deposito.grupos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = new Itemsgroup();
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Detalle' => 'required|string|max:100',
            'Marca' => 'required|string|max:100',
            'SReal' => 'required|string|max:100',
            'SMin' => 'required|string|max:100',
            'SMax' => 'required|string|max:100',
            'VUActual' => 'required|string|max:100',

            
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosGrupo = request()->except('_token');
        $datosGrupo['Identificador'] = "A";

      
        Itemsgroup::insert($datosGrupo);
        return redirect('grupos')->with('mensaje', 'Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Itemsgroup::destroy($id);
        return redirect('grupos')->with('mensaje', 'Empleado boreado con éxito');
    }
}
