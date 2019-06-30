<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
    	return view('theme.backoffice.pages.admin.show');
    }

    public function __construct()
	{
		$this->middleware('role:' . config('app.admin_role') . '-' . config('app.assistant_role'));
	}
}
