<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'mat_materia';
    protected $primaryKey = 'mat_id';
    public $timestamps = false;
}
