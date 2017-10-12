<?php

namespace App\Http\Controllers;

use Session;
use App\Quotes;
use App\Services\QuoteServices;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quotes::where('status','<',2)->get();
        return view('quotes.index')->with(compact('quotes'));
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
        $quote = Quotes::create([
            'name'      =>  $request->input('name'),
            'surname'   =>  $request->input('surname'),
            'phone'     =>  $request->input('phone'),
            'email'     =>  $request->input('email'),
            'product'   =>  $request->input('product')
        ]);
        Session::flash('success','Merci, '.$request->input('surname').', Stephanie a bien reçu votre demande et vous contacteras bientôt.');
        return redirect('/#content');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function show(Quotes $quotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotes $quotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotes $quotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotes $quote)
    {
        $quote->delete();
        return redirect()->back();
    }

    public function contact($quoteId)
    {
        $quote = Quotes::find($quoteId);
        $quote->status = 1;
        $quote->save();

        return redirect()->back();
    }

    public function transform($quoteId)
    {
        $quoteServices = new QuoteServices($quoteId);
        $booking = $quoteServices->createBooking();

        return redirect('/bookings/'.$booking->id.'/edit');
    }
}
