<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PreviousSearch;
use Illuminate\Http\Request;

class PreviousSearchController extends Controller
{
    public function index () {
    	$previousSearches = PreviousSearch::orderByDesc('updated_at')->limit(20)->get();

    	return response([
    		'previousSearches' => $previousSearches
    	]);
    }
}
