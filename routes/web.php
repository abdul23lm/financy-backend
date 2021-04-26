<?php

use Illuminate\Support\Facades\{Auth, Route};

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
