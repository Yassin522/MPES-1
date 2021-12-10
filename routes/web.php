<?php

use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    //$tr = new GoogleTranslate('en');    // Translates into English

  //  $tr = new GoogleTranslate('fr'); // Translates into france
   // return $tr->translate('hello world');
    return  GoogleTranslate::trans('Hello again', 'fr');

    // return view('welcome');
});
