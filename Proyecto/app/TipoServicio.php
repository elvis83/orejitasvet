<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'ser_tipo_servicios';

    protected $fillable = [
    	'tips_desc', 'tips_costo', 'ser_id'
    ];

    //Relaciones

    public function servicio()
    {
    	return $this->belongsTo('App\Servicio','id');
    }

    //Almacenamiento

    public function store($request)
    {
    	return self::create($request->all());
    }

    public function my_update($request)
    {
    	return self::update($request->all());
    }
}
