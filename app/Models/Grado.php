<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grd_grado';
    protected $primaryKey = 'grd_id';
    public $timestamps = false;

    public function alumnos()
    {
        return $this->hasMany(Alumno::class,'alm_id_grd','grd_id');
    }

}
