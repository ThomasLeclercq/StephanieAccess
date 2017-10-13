<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Booking;
use App\Category;
use Illuminate\Http\Request;
use DateTime;

class BookingController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::where('date','>=',date('Y-m-d H:i:s'))->get();
        return view('booking.index')->with(compact('bookings'));
    }

    public function pastBookings()
    {
        $bookings = Booking::where('date','<=',date('Y-m-d H:i:s'))->get();
        $pastBookings = true;
        return view('booking.index')->with(compact('pastBookings','bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 'Hello WOrld this a CREATE';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 'Hello WOrld this a Store';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        echo 'Hello WOrld this a SHOW';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $categories = Category::all();
        $availabilities = Availability::where('motiv','unavailable')->get();
        $JSONavailabilities = json_encode($availabilities);

        return view('booking.details')->with(compact('booking','JSONavailabilities','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        
        $booking->date = date_format(date_create($request->input('date')),'Y-m-d H:i');
        $booking->product = $request->input('product');
        $booking->save();
        
        return redirect('/bookings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back();
    }
}
