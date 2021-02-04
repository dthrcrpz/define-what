<?php

Route::post('words/search', 'API\WordController@search');
Route::get('words/{word}', 'API\WordController@show');