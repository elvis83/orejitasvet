<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoExamen extends Model
{
    protected $primaryKey = 'tipe_id';

    protected $table = 'ser_tipo_examenes';

    protected $fillable = [
    	'tipe_nombre', 'tipe_estado', 'exa_id'
    ];
}
