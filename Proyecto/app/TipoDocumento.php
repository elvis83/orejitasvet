<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $primaryKey = 'tipd_id';

    protected $table = 'res_tipodocumentos';

    protected $fillable = [
    	'tipd_nombre', 'tipd_abreviatura',
    ];

    public function personas()
    {
        return $this->hasMany('App\Persona');
    }

    //Almacenamiento

    public function store($request)
    {  
        $slug = str_slug($request->tipd_nombre, '-');
        return self::create($request->all() + [
            'slug' => $slug,
        ]);
    }

    public function my_update($request)
    {
        $slug = str_slug($request->tipd_nombre, '-');
        self::update($request->all() + [
            'slug' => $slug
        ]);
    }

    //Validacion

    //Recuperacion de Informacion

    //Otras Operaciones
}
