<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurnoMedico extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'res_turnos';

    protected $fillable = [
    	'turn_fectur', 'tur_hini', 'tur_hfin', 'tur_estado', 'user_id'
    ];

    //Relaciones

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
