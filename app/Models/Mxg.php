<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mxg extends Model
{
    protected $table = 'mxg_materiasxgrado';
    protected $primaryKey = 'mxg_id';
    public $timestamps = false;

    public function materia()
    {
        return $this->belongsTo(Materia::class,'mxg_id_mat');
    }
    
}
