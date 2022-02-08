<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Http\Requests\MateriaRequest;
use DB;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias= Materia::orderBy('mat_nombre')->get();
        return view('materias.index',compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaRequest $request)
    {
        try{
            $materia = new materia();
            $materia->mat_nombre = $request->mat_nombre;
            $materia->save();
            return redirect()->route('materias.index')->withSuccess(__('Materia creada correctamente.'));
        } catch(\Exception $e){
            return redirect()->route('materias.index')->withError(__('Lo sentimos ocurrió un error'));
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
        $materia=Materia::find($id);
        return view('materias.show',compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia= Materia::find($id);
        return view('materias.edit',compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaRequest $request, $id)
    {
        $materia= Materia::find($id);
        try{
            $materia->mat_nombre = $request->mat_nombre;
            $materia->save();
            return redirect()->route('materias.index')->withSuccess(__('Materia editada correctamente.'));
        } catch(\Exception $e){
            return redirect()->route('materias.index')->withError(__('Lo sentimos ocurrió un error'));
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
        $materia= Materia::find($id);
        DB::beginTransaction();
        try{
            $materia->delete();
            DB::commit();
            return redirect()->route('materias.index')->with('success','Materia eliminada exitosamente.');
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('materias.index')->with('error','Lo sentimos ocurrió un error');
        }
    }
}
