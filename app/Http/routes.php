<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
 Route::get('/', function() {
        return view ('home');
    })->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/organisator/dashboard', [
        'uses' => 'InlogController@getDashboard',
        'as' => 'dashboard'
    ]);
});

Route::get('/organisator/logout', [
    'uses' => 'InlogController@getLogout',
    'as' => 'user.logout'
]);

Route::get('/dashboard', function () {
    return view('organisator.organisator-dashboard');
})->name('dashboard');

Route::get('/organisator/login', function () {
    return view('organisator.organisator-login');
})->name('user.login');
    
Route::group(['prefix' => 'agenda'], function() {
    Route::get('/', function () {
        return view('agenda.agenda');
    })->name('agenda');
    
    Route::get('/aanmeldingen', function () {
        return view('agenda.aanmeldingen');
    })->name('aanmeldingen');
    
    Route::get('/vrijdag', [
        'uses' => 'AanmeldController@getVrijdag',
        'as' => 'vrijdag'
    ]);
    
    Route::get('/zaterdag', [
        'uses' => 'AanmeldController@getZaterdag',
        'as' => 'zaterdag'
    ]);
    
    Route::get('/zondag', [
        'uses' => 'AanmeldController@getZondag',
        'as' => 'zondag'
    ]);
});
 
Route::group(['prefix' => 'reservering'], function() {
    
    Route::get('/', ['uses' => 'ReserveringController@getReserveringIndex', 'as' => 'reservering']);
    
    Route::post('/postreservering', ['uses' => 'ReserveringController@postReservering', 'as' => 'postreservering']);
    
    Route::post('/postreserveringarray', ['uses' => 'ReserveringController@postReserveringArray', 'as' => 'postreserveringarray']);
    
    Route::get('/complete', function() {
        return view('reserveren.complete');
    })->name('reserverenComplete');
});

Route::group(['prefix' => 'aanmelden'], function() {
    
    Route::get('/', function () {
        return view('aanmelden.aanmelden');
    })->name('aanmelden');
    
   Route::post('/postinlogArray', ['uses' => 'InlogController@postInlogArray', 'as' => 'postInlogarray']);
   
   Route::post('/postaanmelding', ['uses' => 'AanmeldController@postaanmelding', 'as' => 'postaanmelding']);
    
    Route::get('/complete', function () {
        return view('aanmelden.complete');
    })->name('complete');
    
    Route::post('/postacceptaanmelding', ['uses' => 'OrganisatorController@postacceptaanmelding', 'as' => 'postacceptaanmelding']);
    
    Route::post('/postdeclineaanmelding', ['uses' => 'OrganisatorController@postdeclineaanmelding', 'as' => 'postdeclineaanmelding']);
    
    Route::post('/sendoverzichtsemail', ['uses' => 'OrganisatorController@sendoverzichtsemail', 'as' => 'sendoverzichtsemail']);
    
});

    Route::post('/ContactForm', ['uses' => 'ContactController@ContactForm', 'as' => 'ContactForm']);

 Route::get('/agenda', function() {
        return view ('agenda.agenda');
    })->name('agenda');
 
 Route::get('/contact', function() {
        return view ('contact.contact');
    })->name('contact');
    
 Route::get('/betaling', function() {
        return view ('reservering.betaling');
    })->name('betaling'); 