<?php

Route::get('words/{word}', 'API\WordController@show');

Route::get('previous-searches', 'API\PreviousSearchController@index');