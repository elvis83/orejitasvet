<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'ser_insumos';

    protected $fillable = [
    	'ins_desc', 'ins_uni', 'ins_stock', 'ins_fecven', 'ins_estado'
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
