<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecetaDetalle extends Model
{
    protected $primaryKey = 'detr_id';

    protected $table = 'ser_receta_medica_detalles';

    protected $fillable = [
    	'detr_can', 'detr_obs', 'detr_dia', 'detr_ind', 'rec_id', 'medi_id'
    ];
}
