<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\Grado;
use App\Http\Requests\AlumnoRequest;
use DB;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos= Alumno::orderBy('alm_nombre')->get();

        return view('alumnos.index',compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados= Grado::orderBy('grd_nombre')->get();
        return view('alumnos.create',compact('grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        try{
            $alumno = new Alumno();
            $alumno->alm_codigo =$request->alm_codigo;
            $alumno->alm_nombre = $request->alm_nombre;
            $alumno->alm_edad = $request->alm_edad;
            $alumno->alm_sexo = $request->alm_sexo;
            $alumno->alm_id_grd = $request->alm_id_grd;
            $alumno->alm_observacion = $request->alm_observacion;
            $alumno->save();
            return redirect()->route('alumnos.index')->withSuccess(__('Alumno creado correctamente.'));
        } catch(\Exception $e){
            return redirect()->route('alumnos.index')->withError(__('Lo sentimos ocurrió un error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno= Alumno::find($id);
        $grados= Grado::orderBy('grd_nombre')->get();
        return view('alumnos.show',compact('grados','alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno= Alumno::find($id);
        $grados= Grado::orderBy('grd_nombre')->get();
        return view('alumnos.edit',compact('grados','alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoRequest $request, $id)
    {
        $alumno= Alumno::find($id);
        try{
            $alumno->alm_codigo =$request->alm_codigo;
            $alumno->alm_nombre = $request->alm_nombre;
            $alumno->alm_edad = $request->alm_edad;
            $alumno->alm_sexo = $request->alm_sexo;
            $alumno->alm_id_grd = $request->alm_id_grd;
            $alumno->alm_observacion = $request->alm_observacion;
            $alumno->save();
            return redirect()->route('alumnos.index')->withSuccess(__('Alumno editado correctamente.'));
        } catch(\Exception $e){
            return redirect()->route('alumnos.index')->withError(__('Lo sentimos ocurrió un error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno= Alumno::find($id);
        DB::beginTransaction();
        try{
            $alumno->delete();
            DB::commit();
            return redirect()->route('materias.index')->with('success','Alumno eliminado exitosamente.');
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('materias.index')->with('error','Lo sentimos ocurrió un error');
        }
    }
}
