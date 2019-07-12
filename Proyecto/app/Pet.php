<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'ser_mascotas';

    protected $fillable = [
    	'mas_nombre', 'mas_tipo', 'mas_raza', 'mas_sexo', 'mas_gs', 'mas_alergia', 'mas_fecnac', 'mas_color', 'mas_estado', 'user_id'
    ];

    protected $dates = ['mas_fecnac'];

    //Relaciones
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
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

    //Recuperación de Información
    public function agepet()
    {
        if(!is_null($this->mas_fecnac)){
            $age = $this->mas_fecnac->age;
            $years = ($age == 1) ? 'año' : 'años';
            $msj = $age . ' ' . $years;
        } else {
            $msj = 'Indefinido';
        }
        return $msj;
    }
}
