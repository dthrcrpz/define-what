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

    public function search (Request $r) {
    	$validator = \Validator::make($r->all(), [
    		'query' => 'required'
    	]);

    	if ($validator->fails()) {
    		return response([
    			'errors' => $validator->errors()->all()
    		], 400);
    	}

    	return $this->wordsAPI->search($query);
    }

    public function show ($word) {
    	return $this->wordsAPI->get($word);
    }
}
