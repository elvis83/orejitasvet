<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function user_speciality(Request $request)
    {
    	if($request->ajax()){
    		$speciality = \App\Speciality::findOrFail($request->speciality);
    		$users = $speciality->users;
    		return response()->json($users);
    	}
    }

    public function pet_user(Request $request)
    {
        if($request->ajax()){
            $user = \App\User::findOrFail($request->user);
            $pets = $user->pets;
            return response()->json($pets);
        }
    }

    public function invoice_info(Request $request)
    {
    	if($request->ajax())
    	{
    		$invoince = \App\Invoice::findOrFail($request->invoice_id);
    		$invoice_metas = $invoince->metas;
    		return response()->json([
    			'invoice' => $invoice,
    			'doctor' => $invoice->doctor('No aplica'),
    			'concept' => $invoice->concept()
    		]);
    	}
    }

    public function note_info(Request $request)
    {
        if($request->ajax()){
            $note = \App\ClinicNote::findOrFail($request->note_id);
            return response()->json([
                'route' => route('backoffice.clinic_note.update', [$note->user, $note]),
                'description' => $note->description,
                'privacy' => $note->privacy
            ]);
        }
    }
}
