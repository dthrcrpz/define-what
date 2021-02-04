<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WordsAPI
{
	protected $headers;

	public function __construct () {
		$this->headers = [
			'X-Mashape-Key' => config('app.rapid_api_key'),
	        'Content-Type' => 'application/json'
		];
	}

	public function get ($word) {
		$response = Http::withHeaders($this->headers)
        ->get("https://wordsapiv1.p.rapidapi.com/words/$word");

        return response([
        	'data' => $response->json(),
        	'status' => $response->status()
        ]);
	}
}