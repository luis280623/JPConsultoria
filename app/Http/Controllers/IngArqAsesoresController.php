<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IngArqAsesores;

class IngArqAsesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PAGINATION=7;

    public function index(Request $request)
    {
        $buscarpor=trim($request->get('buscarpor'));
        $IngArqAsesores=IngArqAsesores::where('Nombre','LIKE','%'.$buscarpor.'%')
        ->paginate($this::PAGINATION);;
        /* return $IngArqAsesores; */
        return view('AIng&Arq.Administracion.asesores.index',compact('IngArqAsesores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AIng&Arq.Administracion.asesores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $IngArqAsesores=$request->all();
        if($Foto = $request->file('Foto')){
            $rutaGuardarFoto = 'Foto/';
            $FotoPerfil = date('YmdHis').".".$Foto->getClientOriginalExtension();
            $Foto->move($rutaGuardarFoto,$FotoPerfil);
            $IngArqAsesores['Foto'] = "$FotoPerfil";
        };
        IngArqAsesores::create($IngArqAsesores);
        /* $IngArqAsesores=IngArqAsesores::create($request->all()); */
        return redirect()->route('asesores.index')->with('mensaje','Se ha registrado exitosamente');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Id_Asesor)
    {
        /* return $Id_Asesor; */
        $IngArqAsesores=IngArqAsesores::find($Id_Asesor);
        /* return $IngArqAsesores; */
        return view('AIng&Arq.Administracion.asesores.perfil',compact('IngArqAsesores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Id_Asesor)
    {
        /* ACTUALIZAR VARIABLES */
        /* 1er nombre (llama al nombre del modelo) , request nombre(envia a la vista) */
        $IngArqAsesores=IngArqAsesores::find($Id_Asesor);
        $IngArqAsesores->Nombre=$request->Nombre;
        $IngArqAsesores->Apellido=$request->Apellido;
        $IngArqAsesores->Dni=$request->Dni;
        $IngArqAsesores->Email=$request->Email;
        $IngArqAsesores->celular=$request->celular;
        $IngArqAsesores->Direccion=$request->Direccion;
        $IngArqAsesores->Fecha_Nac=$request->Fecha_Nac;
        $IngArqAsesores->CuentaBancaria=$request->CuentaBancaria;
        $IngArqAsesores->CuentaInterbancaria=$request->CuentaInterbancaria;
        $IngArqAsesores->save();
        return redirect()->route('asesores.index')->with('mensaje','Se ha Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Id_Asesor)
    {
        //
        $IngArqAsesores=IngArqAsesores::find($Id_Asesor)->delete();
        return redirect('asesores')->with('datos','OK');
    }
}
