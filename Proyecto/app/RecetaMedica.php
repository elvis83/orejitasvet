<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecetaMedica extends Model
{
    protected $primaryKey = 'rec_id';

    protected $table = 'ser_receta_medicas';

    protected $fillable = [
    	'rec_fecexp', 'rec_feccad', 'dia_id'
    ];
}
