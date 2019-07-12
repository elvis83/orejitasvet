<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $primaryKey = 'dia_id';

    protected $table = 'ser_diagnosticos';

    protected $fillable = [
    	'dia_trat', 'dia_obs', 'res_id'
    ];
}
