<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'ser_servicios';

    protected $fillable = [
    	'ser_nombre'
    ];

    //Relaciones
    public function tiposervicios()
    {
    	return $this->hasMany('App\TipoServicio');
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
