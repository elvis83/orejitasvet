<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function schedule()
	{
		return view('theme.frontoffice.pages.user.client.schedule');
	}

	public function appointments()
	{
		return view('theme.frontoffice.pages.user.client.appointments');
	}

	public function prescriptions()
	{
		return view('theme.frontoffice.pages.user.client.prescriptions');
	}

	public function invoices()
	{
		return view('theme.frontoffice.pages.user.client.invoices');
	}
}
