<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $primaryKey = 'res_id';

    protected $table = 'ser_resultados';

    protected $fillable = [
    	'res_anexo', 'res_anexo', 'res_obs1', 'res_obs2', 'exa_id'
    ];
}
