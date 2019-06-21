<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $primaryKey = 'per_id';

    protected $table = 'res_personas';

    protected $fillable = [
    	'per_id','per_apepat','per_apemat','per_nombres','per_dir','per_nrodoc','per_fecnac','per_sexo','per_tel','per_cel','per_ecivil', 'tipd_id'
    ];

    //Relaciones

    public function tipodocumento()
    {
    	return $this->belongsTo('App\TipoDocumento');
    }

    /*public function users()
    {
    	return $this->belongsToMany('App\User')->withTimestamps();
    }*/

    //Almacenamiento

    public function store($request)
    {
        $slug =str_slug($request->per_apepat, '-');
        return self::create($request->all() + [
            'slug' => $slug,
        ]);
    }

    public function my_update($request)
    {
        $slug = str_slug($request->per_apepat, '-');
        self::update($request->all() + [
            'slug' => $slug
        ]);
    }

    //Validacion

    //Recuperacion de Informacion

    //Otras Operaciones
}
