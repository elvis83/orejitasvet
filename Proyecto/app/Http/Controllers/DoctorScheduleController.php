<?php

namespace App\Http\Controllers;

use App\DoctorSchedule;
use App\User;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function assign(User $user)
    {
    	return view('theme.backoffice.pages.user.doctor.schedule', [
			'user' => $user,
            'days' => ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']
		]);
    }

   /* public function disable_dates(Request $request)
    {
        if($request->ajax()){
            $user = \App\User::findOrFail($request->doctor);
            return response()->json([
                'disable_dates' => $user->manual_disabled_dates(),
                'days_off' => $user->days_off(),
            ]);
        }
    }*/

    public function assignment(Request $request, User $user, DoctorSchedule $doctor_schedule)
    {
    	$msj = [];
		$msj[0] = $doctor_schedule->disable_dates($request, $user);
		$msj[1] = $doctor_schedule->disable_work_days($request, $user);
    }

}
