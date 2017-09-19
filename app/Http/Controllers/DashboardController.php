<?php

namespace App\Http\Controllers;

use App\Availability;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function add()
	{
		
	}

	public function get()
	{
		
		$availabilities = Availability::all();
		return view('dashboard.index')->with(compact('availabilities'));
	}
}