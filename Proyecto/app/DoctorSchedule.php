<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    protected $fillable = [
		'key', 'value', 'user_id',
	];

	#RESTRICCIÓN
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function disable_dates($request, $user)
	{
		//Ahora debemos procesar las fechas para que las podamos manipular con javascript.
		$disabled_dates = new DisableDate();
		$values = $disabled_dates->process_disabled_dates($request->multi_date_input);

		//Actualizar o almacenar las fechas
		DisableDate::updateOrCreate([
			'user_id' => $user->id
		],[
						
			'key' => 'manual',
			'value' => $values
		]);
	}

	/*public function process_disabled_dates($dates)
	{
		//Convertimos en un arreglo las fechas
		$dates = explode(',', $dates);

		//Declaramos la variable new_dates para almacenar las fechas procesadas.
		$str_dates = '';
		// Para el plugin de pickadate es necesario reducir una unidad cada mes para que corresponda con la selección del usuario

		foreach ($dates as $key => $date) {

			$date = trim($date);
			$date_elements = explode('/', $date);
			
			$year = $date_elements[0];
			$month = $date_elements[1];
			$day = $date_elements[2];
			
			$new_date = $year . ',' . ($month - 1) . ',' . $day;
			$str_dates .= $new_date . '-';
		}
		//Eliminamos el último caracter de la cadena
		$str_dates = substr($str_dates, 0, -1);
		
		return $str_dates;
	}*/

	public function manual_disabled_dates()
	{
	    $disable_date = $this->disable_dates()->where('key', 'manual')->first();
	    if(!is_null($disable_date)){
	        return $disable_date->value;
	    }else{
	        return null;
	    }   
	}

	public function disable_work_days($request, $user)
	{
		$days_off = implode('-',$request->week_days_off);

		//Actualizar o almacenar las fechas
		DisableDate::updateOrCreate([
			'user_id' => $user->id,
			'key' => 'days_off',
		],[
			'value' => $days_off
		]);
	}
}
