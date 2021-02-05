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

        return $response;
	}

	public function random () {
		$response = Http::withHeaders($this->headers)
        ->get("https://wordsapiv1.p.rapidapi.com/words/?random=true");

        return $response;
	}

	public function antonyms ($word) {
		$response = Http::withHeaders($this->headers)
        ->get("https://wordsapiv1.p.rapidapi.com/words/$word/antonyms");

        return $response;
	}
}