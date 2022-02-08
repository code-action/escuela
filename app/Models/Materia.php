<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'mat_materia';
    protected $primaryKey = 'mat_id';
    public $timestamps = false;

    public static function comprobar($grado,$materia){
        if(Mxg::where('mxg_id_mat',$materia)->where('mxg_id_grd',$grado)->count()>0){
            return "alert-success";
        }else{
            return "alert-info";
        }
    }

    public static function validar($materia){
        return Mxg::where('mxg_id_mat',$materia)->count();
    }
}
