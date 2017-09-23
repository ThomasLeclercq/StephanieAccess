<?php

namespace App\Http\Controllers;

use App\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $yearMonth = $request->input('monthYear');
        
        $availabilities = Availability::all();

        foreach ($availabilities as $availability) {
            if(date_format(date_create($availability->availaDate),'Y-m') == date_format(date_create($yearMonth),'Y-m')){
                $availability->delete();
            }
        }
        
        $availabilityNumber = $request->input('availableNumber');
        $unavailabilityNumber = $request->input('unavailableNumber');
        
        for ($i=0; $i < $availabilityNumber; $i++) { 

            $availability = Availability::where('availaDate','=',$request->input('dateavailable'.$i))->first();

            if($availability !== null && $availability->motiv != 'available'){
                $availability->motiv == 'available';
                $availability->save();
            }

            if($availability === null){
                Availability::create([
                    'availaDate'    => $request->input('dateavailable'.$i),
                    'motiv'         => 'available'
                ]);
            }
        }

        for ($i=0; $i < $unavailabilityNumber; $i++) { 
            $unavailability = Availability::where('availaDate','=',$request->input('dateunavailable'.$i))->first();

            if($unavailability !== null && $unavailability->motiv != 'unavailable'){
                $unavailability->motiv == 'unavailable';
                $unavailability->save();
            }
            if($unavailability === null){
                Availability::create([
                    'availaDate'    => $request->input('dateunavailable'.$i),
                    'motiv'         => "unavailable"
                ]);
            }
            
        }
        
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
