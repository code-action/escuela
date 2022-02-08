<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alm_alumno';
    protected $primaryKey = 'alm_id';
    public $timestamps = false;

    public function grado()
    {
        return $this->belongsTo(Grado::class,'alm_id_grd');
    }

}
