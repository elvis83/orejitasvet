<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $primaryKey = 'exa_id';

    protected $table = 'ser_examenes';

    protected $fillable = [
    	'exa_temp', 'exa_peso', 'exa_pulso', 'exa_resp', 'exa_anom', 'tips_id', 'ser_id'
    ];
}
