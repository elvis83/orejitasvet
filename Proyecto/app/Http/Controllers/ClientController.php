<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function schedule()
	{
		return view('theme.frontoffice.pages.user.client.schedule', [
			'specialities' => \App\Speciality::all(),
		]);
	}

	public function back_schedule(User $user)
	{
		return view('theme.backoffice.pages.user.client.schedule', [
			'user' => $user
		]);
	}

	public function appointments()
	{
		return view('theme.frontoffice.pages.user.client.appointments');
	}

	public function back_appointments(User $user)
	{
		return view('theme.backoffice.pages.user.client.appointments', [
			'user' => $user
		]);
	}

	public function prescriptions()
	{
		return view('theme.frontoffice.pages.user.client.prescriptions');
	}

	public function invoices()
	{
		return view('theme.frontoffice.pages.user.client.invoices');
	}

	public function back_invoices(User $user)
	{
		return view('theme.backoffice.pages.user.client.invoices', [
			'user' => $user
		]);
	}
}
