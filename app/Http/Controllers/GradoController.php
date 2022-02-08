<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;
use App\Http\Requests\GradoRequest;
use DB;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grados= Grado::orderBy('grd_nombre')->get();
        return view('grados.index',compact('grados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoRequest $request)
    {
        try{
            $grado = new grado();
            $grado->grd_nombre = $request->grd_nombre;
            $grado->save();
            return redirect()->route('grados.index')->withSuccess(__('Grado creado correctamente.'));
        } catch(\Exception $e){
            return redirect()->route('grados.index')->withError(__('Lo sentimos ocurrió un error'));
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
        $grado=Grado::find($id);
        return view('grados.show',compact('grado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grado= Grado::find($id);
        return view('grados.edit',compact('grado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradoRequest $request, $id)
    {
        $grado= Grado::find($id);
        try{
            $grado->grd_nombre = $request->grd_nombre;
            $grado->save();
            return redirect()->route('grados.index')->withSuccess(__('Grado editado correctamente.'));
        } catch(\Exception $e){
            return redirect()->route('grados.index')->withError(__('Lo sentimos ocurrió un error'));
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
        $grado= Grado::find($id);
        DB::beginTransaction();
        try{
            $grado->delete();
            DB::commit();
            return redirect()->route('grados.index')->with('success','Grado eliminado exitosamente.');
        } catch(\Exception $e){
            DB::rollback();
            return redirect()->route('grados.index')->with('error','Lo sentimos ocurrió un error');
        }
    }
}
