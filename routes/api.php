<?php

Route::get('random-word', 'API\WordController@random');
Route::get('words/{word}', 'API\WordController@show');
Route::get('words/{word}/antonyms', 'API\WordController@antonyms');