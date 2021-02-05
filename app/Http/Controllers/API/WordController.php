<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\WordsAPI;
use Illuminate\Http\Request;

class WordController extends Controller
{
	private $wordsAPI;

	public function __construct () {
		$this->wordsAPI = new WordsAPI;
	}

    public function show ($word) {
    	$response = $this->wordsAPI->get($word);

    	return response([
        	'data' => $response->json(),
        	'status' => $response->status()
        ], $response->status());
    }

    public function random () {
        $response = $this->wordsAPI->random();

        return response([
            'data' => $response->json(),
            'status' => $response->status()
        ], $response->status());
    }

    public function antonyms ($word) {
    	$response = $this->wordsAPI->antonyms($word);

    	return response([
        	'data' => $response->json(),
        	'status' => $response->status()
        ], $response->status());
    }
}
