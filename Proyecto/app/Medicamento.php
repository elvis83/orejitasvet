<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'ser_medicamentos';

    protected $fillable = [
    	'medi_nombre', 'medi_desc', 'medi_pres', 'medi_stock', 'medi_fecven', 'medi_estado', 'medi_precio'
    ];

    public function store($request)
    {
    	return self::create($request->all());
    }

    public function my_update($request)
    {
    	return self::update($request->all());
    }
}
