<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;


class MainController extends Controller
{
    public function index()
    {
        $alumnos= Alumno::orderBy('alm_nombre')->get();

        return view('welcome',compact('alumnos'));
    }
    public function filtro(Request $request){

        // echo $request->id;
        if($request->id!=0)
            $alumnos = Alumno::where("alm_id",$request->id)->get();
        else
            $alumnos= Alumno::orderBy('alm_nombre')->get();

        foreach($alumnos as $alumno){
            $alumno->grado;
            $materias= $alumno->grado->materias($alumno->grado->grd_id);
    
            foreach($materias as $materia){
                $materia->materia->mat_nombre;  
            }
            $alumno->materias=$materias;
        }
        return $alumnos;
    }
}
