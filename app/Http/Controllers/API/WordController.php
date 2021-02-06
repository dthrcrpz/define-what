<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PreviousSearch;
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

        if ($response->status() == 200) {
            $this->saveWord($word);
        }

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

    protected function saveWord ($word) {
        $previousWord = PreviousSearch::where('word', $word)->first();

        if ($previousWord) {
            $previousWord->update([
                'count' => $previousWord->count + 1
            ]);
        } else {
            $previousWord = PreviousSearch::create([
                'word' => $word,
                'count' => 1
            ]);
        }
    }
}
