<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function add()
	{
		
	}

	public function get()
	{
		
		$availabilities = Availability::all();
		$jsonAvailabilities = json_encode($availabilities);

		$bookings = Booking::all();

		return view('dashboard.index')->with(compact('jsonAvailabilities','bookings'));
	}
}