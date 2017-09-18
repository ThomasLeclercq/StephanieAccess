<?php 
namespace App\Services;

use App\Quotes;
use App\Client;
use App\Booking;

class QuoteServices {

	protected $quote;

	public function __construct($quoteId)
	{
		$quote = Quotes::find($quoteId);
		$this->quote = $quote;
	}

	private function clientExists()
	{
		$quote = $this->quote;
		$client = Client::where('email','=',$this->quote->email)->first();
		if($client === null){
			return false;
		}
		return true;
	}

	public function createClient()
	{
		if(!$this->clientExists()){
			$client = Client::create([
				'name'		=>	$this->quote->name,
				'surname'	=>	$this->quote->surname,
				'phone'		=>	$this->quote->phone,
				'email'		=>	$this->quote->email
			]);
		} else {
			$client = Client::where('email','=',$this->quote->email)->first();
		}
		return $client;
	}

	public function archiveQuote()
	{
		$quote = $this->quote;
		$quote->status = 2;
		$quote->save();
	}

	public function createBooking()
	{
		$client = $this->createClient();
		$booking = Booking::create([
			'client_id'	=> $client->id,
			'date'		=> date('Y-m-d H:i'),
			'product'	=> $this->quote->product
		]);
		
		$this->archiveQuote();

		return $booking;
	}
}