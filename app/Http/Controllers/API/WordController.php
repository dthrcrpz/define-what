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
    	$wordDefinition = $this->wordsAPI->get($word);

        if ($wordDefinition->status() == 200) {
            $this->saveWord($word);
        }

        $antonyms = $this->wordsAPI->antonyms($word);

    	return response([
        	'data' => $wordDefinition->json(),
        	'status' => $wordDefinition->status(),
            'antonyms' => $antonyms->json(),
        ], $wordDefinition->status());
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
